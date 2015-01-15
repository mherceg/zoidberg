@extends('admin.main')

@section('body')
    <h1 class="page-header">Akcija</h1>
    <form method="POST" action="{{url('admin/akcije-dodaj')}}" accept-charset="UTF-8" class="form-signup">

        <div class="form-group input-group">
            <span class="input-group-addon">Naslov</span>
            <input type="text" name="naziv" class="form-control" value="{{$naziv}}">
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">Opis</span>
            <textarea name="opis" class="form-control " rows="25">{{$opis}}</textarea>

        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">Broj ljudi</span>
            <input type="text" name="max_ljudi" class="form-control" value="{{$max_ljudi}}">
        </div>
        </div>
        <div class="text-center">
            <input type="hidden" name="id" value="{{$id}}"/>
            <button type="submit" class="btn btn-large btn-danger" name="objavi">Objavi</button>
        </div>
    </form>
@stop

@section('nav-top')
    @include('admin.nav-top')
@stop

@section('nav-sidebar')
    @include('admin.nav-left')
@stop