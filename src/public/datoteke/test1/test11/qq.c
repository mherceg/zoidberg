#include <stdio.h>
#include <sys/ipc.h>
#include <sys/sem.h>
#include <sys/types.h>
#include <math.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>

#define MAX_BUFFER 5

void SemGet(int);
int SemSetVal(int, int);
int SemOp(int, int);
void SemRemove(void);
void producer(int, char*);
void consumer(void);

int SemID;
int LENGTH_OF_STRING;
int NUMBER_OF_PRODUCERS;
int count_NULL;
int ULAZ, IZLAZ;
char *M;

int PISI = 0;
int PUN = 1; 
int PRAZAN = 2;


int main (int argc, char *argv[]){

	int i;

	NUMBER_OF_PRODUCERS = argc - 1;

	int MemID = shmget(IPC_PRIVATE, sizeof(int)*2 + sizeof(int)*(MAX_BUFFER + 1) + 100, 0600); 
	if( MemID == -1 ) exit(0);

	ULAZ = (int*)shmat(MemID, NULL, 0);
	IZLAZ = (int*)shmat(MemID, NULL, 0) + sizeof(int);
	M = (char*)shmat(MemID, NULL, 0) + 2 * sizeof(int);
	
	printf("Mem alokacije - OK\n");

	SemGet(3);
	SemOp(PRAZAN, 0);
	SemOp(PUN, MAX_BUFFER);
	SemOp(PISI, 0);

	printf("SemGet/SemOp - OK\n");


	for(i = 1; i < argc; i++)
		LENGTH_OF_STRING += strlen(argv[i]);

	printf("Prije FORa\n");

	for (i = 1; i < argc; i++) {
    	
    	switch( fork() ){
			case -1: printf("Ne mogu stvoriti proces!\n");
			case  0: producer(i, argv[i]); exit(0);
			default: break;
		}
	}

	printf("Poslije FORa\n");

	switch( fork() ){
		case -1: printf("Ne mogu stvoriti proces!\n");
		case  0: consumer(); exit(0);
		default: break;
	}

	printf("Poslije SWITCHa\n");

	while(--argc) wait(NULL);

	SemRemove();

	shmdt((char*)ULAZ);
	shmdt((char*)IZLAZ);
	shmdt((char*)M);
	shmctl(MemID, IPC_RMID, NULL);

	printf("Dealokacija\n");

	return EXIT_SUCCESS;
}


void SemGet(int n){ 
	/* dobavi skup semafora sa ukupno n semafora */
	SemID = semget(IPC_PRIVATE, n, 0600);
	if (SemID == -1) {
		printf("Nema semafora!\n");
		exit(1);
	}
}

int SemSetVal(int SemNum, int SemVal){ 
	/* postavi vrijednost semafora SemNum na SemVal */
	return semctl(SemID, SemNum, SETVAL, SemVal);
}

int SemOp(int SemNum, int SemOp){ 
	/* obavi operaciju SemOp sa semaforom SemNum */
	struct sembuf SemBuf;
	SemBuf.sem_num = SemNum;
	SemBuf.sem_op = SemOp;
	SemBuf.sem_flg = 0;
	
	return semop(SemID, &SemBuf, 1);
}

void SemRemove(void){ 
	/* uništi skup semafora */
	(void) semctl(SemID, 0, IPC_RMID, 0);
}

void producer(int number, char* argument){

	int i = 0;

	while( argument[i] ){
		
		SemOp(PUN, -1);
		SemSetVal(PISI, 0);
		
		M[ULAZ] = argument[i];
		ULAZ = (ULAZ + 1) % 5;

		printf("PROIZVODJAC%d -> %c\n", number, argument[i]);

		SemOp(PUN, 1);
		SemSetVal(PISI, 1);

		i++; 

		sleep(1);
	}

	count_NULL++;
}

void consumer(void){

	char *s;
	s = (char*)malloc(LENGTH_OF_STRING * sizeof(char));
	
	int i = 0;

	do{
		SemOp(PRAZAN, -1);
		
		s[i] = M[IZLAZ];
		IZLAZ = (IZLAZ + 1) % 5;

		SemOp(PUN, 1);

		i++;

	} while (count_NULL <= NUMBER_OF_PRODUCERS);

	s[i] = '\0';

	printf("%s\n", s);
}