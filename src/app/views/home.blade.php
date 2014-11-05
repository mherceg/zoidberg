@extends('main')

<?php
	View::share(array('title' => 'Home', 'ministarstvo' => "wot"));
?>

@section('mainbar')
<section class="section">
                    <div class="section-inner">                        
                        <h6>Autor: Zoidberg | Datum: 01.01.3001.</h6>
                        <h2 class="heading">Naslov</h2>


                        <div class="content">
                            Content
                        </div>

                    </div>
                </section>
@stop

@section('sidebar')
	@include('nav')
@stop