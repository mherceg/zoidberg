
@extends('admin.main')


@section('body')
	<h1 class="page-header">Uredi vijest</h1>
                            <form method="POST" action="{{url('admin/vijesti-dodaj')}}" accept-charset="UTF-8" class="form-signup">
       
                                            <div class="form-group input-group">
                                                <span class="input-group-addon">Naslov</span>
                                                <input type="text" name="naslov" class="form-control" value="{{$naslov}}">
                                            </div>
                                            <div class="form-group input-group">
                                                <span class="input-group-addon">Objava</span>
                                                <textarea name="sadrzaj" class="form-control " rows="25">{{$sadrzaj}}</textarea>
                                        
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <input type="hidden" value="{{$vijest_id}}" name="vid" />
                                        <button type="submit" class="btn btn-large btn-danger" value="0" name="objavi">Samo spremi</button>
                                        <button type="submit" class="btn btn-large btn-danger" value="1" name="objavi">Spremi i objavi</button>
                                    </div>
                                </form>
@stop


@section('nav-top')
	@include('admin.nav-top')
@stop


@section('nav-sidebar')
	@include('admin.nav-left')
@stop