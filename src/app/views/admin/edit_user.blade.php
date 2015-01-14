@extends('admin.main')


@section('body')
                            <h1 class="page-header">Promjena informacija o korisniku</h1>



                            <div style="
                            @if(!isset($usr))    
                            display: none;
                            @endif">
                                <h3 class="page-header">Uređivanje podataka</h3>
                                <form method="POST" action="{{url('admin/korisnici-uredi')}}" accept-charset="UTF-8" class="form-signup">
       
                                    <div class="form-group">
                                        <label>Ime</label>
                                        <input class="form-control" value="@if(isset($usr)){{$usr->ime}}@endif" name="ime">
                                    </div>
                                    <div class="form-group">
                                        <label>Prezime</label>
                                        <input class="form-control" value="@if(isset($usr)){{$usr->prezime}}@endif" name="prez">
                                    </div>
                                    <div class="form-group">
                                        <label>OIB</label>
                                        <input class="form-control" value="@if(isset($usr)){{$usr->oib}}@endif" name="oib">
                                    </div>
                                    <div class="form-group">
                                        <label>Funkcija</label>
                                        <input class="form-control" value="@if(isset($usr)){{$usr->funkcija}}@endif" name="funk">
                                    </div>
                                    <div class="form-group">
                                        <label>Adresa e-pošte</label>
                                        <input class="form-control" value="@if(isset($usr)){{$usr->email}}@endif" name="mail">
                                    </div>
                                    <div class="form-group">
                                        <label>Razina datotečnog pristupa</label>
                                        <input class="form-control" value="@if(isset($usr)){{$usr->d_dozvola}}@endif" name="ddoz">
                                    </div>
                                    <div class="form-group">
                                        <label>Akitivran</label>
                                        <input class="form-control" type="checkbox" name="aktv"
                                        @if(isset($usr))
                                        @if($usr->aktiviran)
                                        checked 
                                        @endif
                                        @endif
                                        />
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-large btn-danger btn-block ">Spremi</button>
                                    </div>
                                </form>
                            </div>

                            <h3 class="page-header">Odabir korisnika</h3>
							<form method="GET" action="{{url('admin/korisnici-uredi')}}" accept-charset="UTF-8" class="form-signup">
                            
										<div class="form-group">

                                            <select class="form-control" name="uid">
                                                @foreach($kor as $kk)
                                                <option value="{{$kk->id}}">{{$kk->prezime}}, {{$kk->ime}}</option>
                                                @endforeach
                                            </select>
                                          </div>
                                        <div class="text-center">
                                        <button type="submit" class="btn btn-large btn-danger btn-block">Odaberi korisnika</button>
                                    </div>
                                </form>


                                <br/>
@stop


@section('nav-top')
	@include('admin.nav-top')
@stop


@section('nav-sidebar')
	@include('admin.nav-left')
@stop