@extends('main')

@section('mainbar')
    <section class="section">
        <section class="section-inner">
            <h1>Nova vijest</h1>
            {{Form::open()}}
            <h3>Naslov</h3>
            {{ Form::text('naslov') }}
            <h3>Sadržaj</h3>
            {{ Form::textarea('sadrzaj') }}
            </br>
            {{ Form::submit('Objavi') }}
            {{Form::close()}}
        </section>
    </section>
@stop

@section('sidebar')
	@include('nav')
@stop