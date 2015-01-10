
@extends('admin.main')


@section('body')
    

	<h1 class="page-header">Pregled poruka</h1>
    <form method="POST" action="{{url('admin/poruke-administracija-posalji')}}" accept-charset="UTF-8" class="form-signup"  enctype="multipart/form-data">
        <input type="hidden" name="sid" value="{{Auth::id()}}">
        <div class="col-md-9">
                <div class="form-group input-group">
                                                <span class="input-group-addon">Naslov</span>
                                                <input type="text" name="naslov" class="form-control" value="">
                                            </div>
                 <div class="form-group">
                     <textarea name="poruka" class="form-control " rows="20"></textarea>
                </div>

                <div class="form-group">

                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-large btn-danger btn-block">Pošalji</button>
                </div>
        </div>
        <div id="test-list">
            <div class="col-md-3">
                <div class="input-group custom-search-form">
                                        <input type="text" class="form-control fuzzy-search"  placeholder="Potraži korisnika">
                                        <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                </div>

                <br/>

                <div id="korisnici">
                                        
                    <ul class="list">
                        @foreach($korisnici as $k)
                        <li>
                            <div class="checkbox">

                                    <input type="checkbox" name="korisnici[]" value="{{$k->id}}"><p class="name">{{$k->prezime}}, {{$k->ime}}</p></input>

                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </form>
@stop


@section('nav-top')
	@include('admin.nav-top')
@stop


@section('nav-sidebar')
	@include('admin.nav-left')
@stop