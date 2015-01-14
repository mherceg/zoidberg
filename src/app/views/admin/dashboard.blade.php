@extends('admin.main')


@section('body')
	<h1 class="page-header">{{$ministarstvo}}</h1>
	<p class="text-center"><i>Freedom, freedom, freedom oi! Freedom, freedom, freedom oi! -- dr. John A. Zoidberg</i></p>

	<div class="col-md-4"><h3 class="page-header">Pregled najnovijih poruka</h3>
		<ul class="list">
			<?php $evilCounter = 0; ?>
			@foreach($pm_topbar as $p)
			<li>{{$p->naslov}}</li>
			<?php $evilCounter = $evilCounter +1;
				if($evilCounter >= 10)
					break;
				?>
			@endforeach
		</ul>
	</div>
	<div class="col-md-4"><h3 class="page-header">Pregled najnovijih vijesti</h3>
		<ul class="list">
			<?php $evilCounter = 0; ?>
			@foreach($vijestiDash as $p)
			<li><strong>{{$p->naslov}}</strong>, {{$p->autor->prezime}}, {{$p->autor->ime}}</li>
			<?php $evilCounter = $evilCounter +1;
				if($evilCounter >= 10)
					break;
				?>
			@endforeach
		</ul>

	</div>
	<div class="col-md-4"><h3 class="page-header">Pregled najnovijih akcija</h3>
		<ul class="list">
			<?php $evilCounter = 0; ?>
			@foreach($eventi as $p)
			<li>{{$p->naslov}}</li>
			<?php $evilCounter = $evilCounter +1;
				if($evilCounter >= 10)
					break;
				?>
			@endforeach
		</ul>

	</div>


@stop


@section('nav-top')
	@include('admin.nav-top')
@stop


@section('nav-sidebar')
	@include('admin.nav-left')
@stop