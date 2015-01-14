@extends('main')

@section('mainbar')
    <section class="section">
        <section class="section-inner">
            <h1>{{$akcija->naziv}}</h1>
            <hr class="divider"/>

            {{ Form::open(array('class' => 'form-signup')) }}
            {{ Form::text('ime', null, array('class'=>'input-block-level', 'placeholder'=>'Ime')) }}
            {{ Form::text('prezime', null, array('class'=>'input-block-level', 'placeholder'=>'Prezime')) }}
            {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'E-mail')) }}
            {{ Form::text('oib', null, array('class'=>'input-block-level', 'placeholder'=>'OIB')) }}
            {{ Form::hidden('id_akcije', $akcija->id) }}
            {{ Form::submit('Prijavi me!', array('class'=>'btn btn-large btn-danger btn-block'))}}
            {{ Form::close() }}
        </section>
    </section>
@stop

@section('sidebar')
    @include('nav')
@stop