@extends('main')

@section('mainbar')
                <section class="section">
                    <div class="section-inner">
                        <h6>{{$ministarstvo}}</h6>
                        <h2 class="heading">Djelatnici ministarstva</h2>

                        <div class="content">
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