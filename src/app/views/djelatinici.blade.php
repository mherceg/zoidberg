@extends('main')

@section('mainbar')
                <section class="section">
                    <div class="section-inner">
                        <h6>{{$ministarstvo}}</h6>
                        <h2 class="heading">Djelatnici ministarstva</h2>

                        <div class="content">
                            <ul>
                                @foreach($djelatnici as $djel)
                                    <li><strong>{{$djel->prezime}}, {{$djel->ime}}</strong>: {{$djel->dobijTituluTipa()}}, {{$djel->funkcija}}</li>
                                @endforeach
                            </ul>

                    </div>
                </section>
@stop

@section('sidebar')
	@include('nav')
@stop