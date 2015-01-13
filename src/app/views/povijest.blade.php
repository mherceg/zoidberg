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
    <section class="section">
        <section class="section-inner">
            {{$ciconia->render($povijest)}}
        </section>
    </section>
@stop

@section('sidebar')
	@include('nav')
@stop