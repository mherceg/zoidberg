@extends('admin.main')


@section('body')
							<h1 class="page-header">Uređivanje datoteka</h1>
							<form method="POST" action="{{url('admin/datoteke/direktorij')}}" accept-charset="UTF-8" class="form-signup">
       
                                        <h4 class="page-header">Dodaj direktorij</h4>
										<div class="form-group">
                                            <input class="form-control" inline="" name="naziv" placeholder="Naziv novog direktorija">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Odaberi direktorij</label>
                                            <select class="form-control" name="roditelj">
                                                @foreach($folderi as $f)
                                                    <option value="{{$f->id}}">{{$f->dobijCijeliPath()}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="text-center">
                                        <button type="submit" class="btn btn-large btn-danger btn-block">Dodaj</button>
                                    </div>
                                </form>
@stop


@section('nav-top')
	@include('admin.nav-top')
@stop


@section('nav-sidebar')
	@include('admin.nav-left')
@stop