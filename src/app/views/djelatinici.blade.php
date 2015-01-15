@extends('main')

@section('mainbar')
                <section class="section">
                    <div class="section-inner">
                        <h6>{{$ministarstvo}}</h6>
                        <img src="djel.jpg" style="width: 100%; margin: 5px" />


                        <div class="content">
                        <h2 class="heading">Djelatnici ministarstva</h2>
                            <ul>
                                @foreach($djelatnici as $djel)
                                    <li><a href="{{ url('pregled_djelatnika').'?uid='.$djel->id }}"><strong>{{$djel->prezime}}, {{$djel->ime}}</strong></a>: {{$djel->funkcija}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </section>
@stop

@section('sidebar')
	@include('nav')
@stop