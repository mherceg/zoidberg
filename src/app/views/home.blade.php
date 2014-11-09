@extends('main')

<?php 
    use Ciconia\Ciconia; 
    use Ciconia\Extension\Gfm;
    
    $ciconia = new Ciconia();

    $ciconia->addExtension(new Gfm\FencedCodeBlockExtension());
    $ciconia->addExtension(new Gfm\TaskListExtension());
    $ciconia->addExtension(new Gfm\InlineStyleExtension());
    $ciconia->addExtension(new Gfm\WhiteSpaceExtension());
    $ciconia->addExtension(new Gfm\TableExtension());
    $ciconia->addExtension(new Gfm\UrlAutoLinkExtension());

?>

@section('mainbar')
            @foreach($vijesti as $vijest)
                @if($vijest->objavljeno)
                <section class="section">
                    <div class="section-inner">                        
                        <h6>Autor: {{ $vijest->prezime }}, {{ $vijest->ime }} | Datum: {{ date("d.m.Y. - H:i", strtotime($vijest->datum)) }}</h6>
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