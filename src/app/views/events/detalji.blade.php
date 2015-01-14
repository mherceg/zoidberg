@extends('main')

@section('mainbar')
    <section class="section">
        <section class="section-inner">
            <h2 class="heading">{{ $akcija->naziv }}</h2>

            <div class="content">
                {{ $akcija->opis }}
            </div>
            <a href="{{$url = action('EventsController@getPrijava', array('id_akcije'=>$akcija->id));}}">
                <button class="btn btn-large btn-danger">Hoću i ja!</button>
            </a>
        </section>
    </section>
@stop

@section('sidebar')
    @include('nav')
@stop