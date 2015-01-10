
@extends('admin.main')


@section('body')
	<h1 class="page-header">Pregled poruka</h1>

	<table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Pošiljatelj</th>
                                                    <th>Naslov</th>
                                                    <th>Vrijeme</th>
                                                    <th>Sadržaj</th>
                                                    <th>Privitak</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                 @foreach($pmovi as $pm)
                                                <tr>
                                                    <td>{{$pm->sender->prezime}}, {{$pm->sender->ime}}</td>
                                                    <td>{{$pm->naslov}}</td>
                                                    <td>{{$pm->vrijeme}}</td>
                                                    <td>{{$pm->sadrzaj}}</td>
                                                    <td>
                                                        @if(strlen($pm->privitak) == 0)
                                                            -
                                                        @else
                                                            <a href="{{$pm->privitak}}">Preuzmi privitak</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
@stop


@section('nav-top')
	@include('admin.nav-top')
@stop


@section('nav-sidebar')
	@include('admin.nav-left')
@stop