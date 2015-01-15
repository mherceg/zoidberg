@extends('admin.main')


@section('body')
							<h1 class="page-header">Uređivanje profila</h1>
							<form method="POST" action="{{url('admin/profil')}}" accept-charset="UTF-8" class="form-signup">

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" value="{{Auth::user()->email}}" name="mail">
                                        </div>
                                        <div class="form-group">
                                            <label>Funkcija</label>
                                            <input class="form-control" value="{{Auth::user()->funkcija}}" name="funk">
                                        </div>
                                        <div class="form-group">
                                            <label>Loznika</label>
                                            <input class="form-control" value="" name="pwd1" type="password">
                                        </div>
                                        <div class="form-group">
                                            <label>Potvrdi lozinku</label>
                                            <input class="form-control" value="" name="pwd2" type="password">
                                        </div>
                                        <div class="text-center">
                                        <button type="submit" class="btn btn-large btn-danger btn-block">Spremi promjene</button>
                                    </div>
                                </form>
@stop


@section('nav-top')
	@include('admin.nav-top')
@stop


@section('nav-sidebar')
	@include('admin.nav-left')
@stop