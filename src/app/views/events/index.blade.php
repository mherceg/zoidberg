@extends('main')

@section('mainbar')
    @foreach($akcije as $akcija)
        <section class="section">
            <section class="section-inner">

                <h2 class="heading">{{ $akcija->naziv }}</h2>

                <a href="{{$url = action('EventsController@getDetalji', array('id'=>$akcija->id));}}">
                    <button class="btn btn-large btn-danger">Detalji</button>
                </a>
            </section>
        </section>
    @endforeach
@stop

@section('sidebar')
    @include('nav')
@stop