@extends('admin.main')


@section('body')
							<h1 class="page-header">Uređivanje povijesti</h1>
							<form method="POST" action="{{url('admin/povijest')}}" accept-charset="UTF-8" class="form-signup">
       
										<div class="form-group">
                                            <textarea name="povijest" class="form-control " rows="25">{{$povijest}}</textarea>
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