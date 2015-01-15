@extends('main')

@section('mainbar')
    <section class="section">
        <section class="section-inner">
            <h2 class="heading">{{ $akcija->naziv }}</h2>

            <div class="content">
                {{ $akcija->opis }} </br></br>
                Najviše posjetitelja: {{ $akcija->max_ljudi }} </br>
                Do sad prijavljeno: {{ $broj_prijavljenih }}
            </div>
            <a
                href="{{$url = action('EventsController@getPrijava', array('id_akcije'=>$akcija->id));}}"
                class="btn btn-large btn-danger {{ $broj_prijavljenih < $akcija->max_ljudi ? "" : "disabled" }}">
                Hoću i ja!
            </a>
        </section>
    </section>
@stop

@section('sidebar')
    @include('nav')
@stop