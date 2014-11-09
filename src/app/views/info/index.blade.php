@extends('main')

@section('mainbar')
    <section class="section">
        <section class="section-inner">
            <h1>Podaci o ministarstvu</h1>
            <h2>Naziv ministarstva</h2>
            {{$podaci->naziv}}
            <h2>Adresa</h2>
            {{$podaci->adresa}}
            <h2>Članovi uprave</h2>
            //TODO clanovi uprave
            <h2>Telefon</h2>
            {{$podaci->telefon}}
            <h2>E-mail</h2>
            {{$podaci->email}}
            <h2>Slika lokacije</h2>
            <img src="{{asset($podaci->slika_lokacija)}}" style = "width: 100%" >
        </section>
    </section>
@stop

@section('sidebar')
	@include('nav')
@stop