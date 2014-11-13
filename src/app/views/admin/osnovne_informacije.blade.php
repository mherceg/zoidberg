@extends('admin.main')


@section('body')
							<h1>Promjena osnovnih podataka</h1>
							<form method="POST" action="{{url('admin/osnovnipodaci')}}" accept-charset="UTF-8" class="form-signup">
       
										<div class="form-group">
                                            <label>Naziv ministarstva</label>
                                            <input class="form-control" value="{{ $op->naziv }}" name="naziv">
                                        </div>
										<div class="form-group">
                                            <label>Država</label>
                                            <input class="form-control" value="{{ $op->podnaziv }}" name="podnaziv">
                                        </div>
										<div class="form-group">
                                            <label>Adresa</label>
                                            <input class="form-control" value="{{ $op->adresa }}" name="adresa">
                                        </div>
										<div class="form-group">
                                            <label>Telefon</label>
                                            <input class="form-control" value="{{ $op->telefon }}" name="telefon">
                                        </div>
										<div class="form-group">
                                            <label>E-Mail tajništva</label>
                                            <input class="form-control" value="{{ $op->email }}" name="email">
                                        </div>
										<div class="form-group">
                                            <label>Lokacija emblema</label>
                                            <input class="form-control" value="{{ $op->emblem_lokacija }}" name="lemb">
                                        </div>
										<div class="form-group">
                                            <label>Lokacija slike zgrade</label>
                                            <input class="form-control" value="{{ $op->slika_lokacija }}" name="lzg">
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