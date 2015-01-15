
@extends('admin.main')


@section('body')

    <h3 class="page-header">Dodavanje novih kategorija</h3>
    <form method="POST" action="{{url('admin/poruke-gradjani')}}" accept-charset="UTF-8" class="form-signup">
        <div class="form-group">
            <input class="form-control" value="" name="novaKat">
        </div>

        <button class="btn btn-block btn-danger">Dodaj kategoriju</button>

    </form>

	<h1 class="page-header">Pregled javnih poruka</h1>

	<table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Naslov</th>
                                                    <th>Sadržaj</th>
                                                    <th>Vrijeme</th>
                                                    <th>E-Mail pošiljatelja</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                 @foreach($pmovi as $pm)
                                                <tr>
                                                    <td>{{$pm->naslov}}</td>
                                                    <td>{{$pm->sadrzaj}}</td>
                                                    <td>{{$pm->vrijeme}}</td>
                                                    <td><a href="mailto:{{$pm->sender_mail}}">{{$pm->sender_mail}}</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
@stop


@section('nav-top')
	@include('admin.nav-top')
@stop


@section('nav-sidebar')
	@include('admin.nav-left')
@stop