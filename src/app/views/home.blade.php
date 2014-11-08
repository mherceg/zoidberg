@extends('main')

<?php use Ciconia\Ciconia; 
    $ciconia = new Ciconia();
?>

@section('mainbar')
            @foreach($vijesti as $vijest)
                @if($vijest->objavljeno)
                <section class="section">
                    <div class="section-inner">
                        <h6>Autor: {{ $vijest->autor->prezime }}, {{ $vijest->autor->ime }} | Datum: {{ date("d.m.Y. - H:i", strtotime($vijest->datum)) }}</h6>
                        <h2 class="heading">{{ $vijest->naslov }}</h2>

                        <div class="content">
                            {{ $ciconia->render($vijest->sadrzaj) }}
                        </div>

                    </div>
                </section>
                @endif
            @endforeach
@stop

@section('sidebar')
	@include('nav')
@stop