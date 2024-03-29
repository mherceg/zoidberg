@extends('main')

@section('mainbar')
                <section class="section">
                    <div class="section-inner">
                        <h2 class="heading"><a href="{{url('popis_djelatnika')}}"><</a> <strong>{{$djel->prezime}}, {{$djel->ime}}</strong>: {{$djel->dobijTituluTipa()}}, {{$djel->funkcija}}</h2>

                        <div class="content text-center">
                            <p>Ime: <strong>{{$djel->ime}}</strong></p>
                            <p>Prezime: <strong>{{$djel->prezime}}</strong></p>
                            <p>Titula: <strong>{{$djel->dobijTituluTipa()}}</strong></p>
                            <p>Funkcija: <strong>{{$djel->funkcija}}</strong></p>
                            <p>Adresa e-pošte: <strong>{{$djel->email}}</strong></p>
                        </div>
                        <br />
                        
                            <a href="{{url('kontakt/spec').'?uid='.$djel->id}}"><button class="btn btn-block btn-danger">Kontaktiraj!</button></a>
                        
                    </div>
                </section>
@stop

@section('sidebar')
	@include('nav')
@stop