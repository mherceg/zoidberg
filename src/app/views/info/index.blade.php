@extends('main')

@section('mainbar')
    <section class="section">
        <section class="section-inner">
            <h6>Podaci o ministarstvu</h6>
            <h3>Naziv ministarstva</h3>
            {{$podaci->naziv}}
            <h3>Adresa</h3>
            {{$podaci->adresa}}
            <h3>Telefon</h3>
            {{$podaci->telefon}}
            <h3>E-mail</h3>
            {{$podaci->email}}
            <h3>Slika lokacije</h3>
            <img src="{{asset($podaci->slika_lokacija)}}" style = "width: 100%" >
        </section>
    </section>
@stop

@section('sidebar')
	@include('nav')
@stop