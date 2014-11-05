@extends('main') 

<?php
    View::share(array('title' => 'Login', 'ministarstvo' => "wot"));
?>
@section('mainbar')
        
                <h1>Prijava</h1>
                <hr class="divider" />

                {{ Form::open(array('url' => '/login', 'class' => 'form-signup')) }}
                    {{ Form::text('email', null, array('class'=>'input-block-level', 'placeholder'=>'Email Address')) }}
                    {{ Form::password('password', array('class'=>'input-block-level', 'placeholder'=>'Password')) }}
 
                {{ Form::submit('Prijava', array('class'=>'btn btn-large btn-danger btn-block'))}}
                {{ Form::close() }}
@stop

@section('sidebar')
    @include('nav')
@stop