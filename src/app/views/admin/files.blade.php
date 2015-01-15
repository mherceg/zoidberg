@extends('admin.main')


@section('body')
							<h1 class="page-header">Slanje datoteka</h1>
							<form method="POST" action="{{url('admin/datoteke/datoteke')}}" accept-charset="UTF-8" class="form-signup" enctype="multipart/form-data">
       
                                        <div class="form-group">
                                            <label>Odaberi direktorij</label>
                                            <select class="form-control" name="roditelj">
                                                @foreach($folderi as $f)
                                                    <option value="{{$f->id}}|{{$f->dobijCijeliPath()}}">{{$f->dobijCijeliPath()}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Odaberi tajnost</label>
                                            <select class="form-control" name="tajnost">
                                                <option value="0">Javno</option>
                                                <option value="1">Tajno</option>
                                                <option value="2">Posebno tajno</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input type="file" name="fileToUpload" id="fileToUpload">
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