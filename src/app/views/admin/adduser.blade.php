@extends('admin.main')


@section('body')
							<h1 class="page-header">Dodavanje korisnika</h1>
							<form method="POST" action="{{url('admin/korisnici-dodaj')}}" accept-charset="UTF-8" class="form-signup">
       
										<div class="form-group">
                                            <label>Ime</label>
                                            <input class="form-control" value="" name="ime">
                                        </div>
										<div class="form-group">
                                            <label>Prezime</label>
                                            <input class="form-control" value="" name="prezime">
                                        </div>
                                        <div class="form-group">
                                            <label>OIB</label>
                                            <input class="form-control" value="" name="oib">
                                        </div>
										<div class="form-group">
                                            <label>Funkcija</label>
                                            <input class="form-control" value="" name="funkcija">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" value="" name="mail">
                                        </div>
                                        <div class="form-group">
                                            <label>Loznika</label>
                                            <input class="form-control" value="" name="pwd1" type="password">
                                        </div>
                                        <div class="form-group">
                                            <label>Potvrdi lozinku</label>
                                            <input class="form-control" value="" name="pwd2" type="password">
                                        </div>
										<div class="form-group">
                                            <label>Uloga</label>
                                            <select multiple="" class="form-control" name="uloga">
                                                @foreach($tpp as $r)
                                                    <option value="{{$r->id}}">{{$r->titula}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="text-center">
                                        <button type="submit" class="btn btn-large btn-danger btn-block">Spremi</button>
                                    </div>
                                </form>
@stop


@section('nav-top')
	@include('admin.nav-top')
@stop


@section('nav-sidebar')
	@include('admin.nav-left')
@stop