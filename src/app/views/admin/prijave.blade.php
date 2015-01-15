@extends('admin.main')


@section('body')
    <h1 class="page-header">Prijavljeni građani</h1>

    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>Ime</th>
            <th>Prezime</th>
            <th>E_mail</th>
            <th>OIB</th>
            <th>Vrijeme prijave</th>
        </tr>
        </thead>

        <tbody>
        @foreach($prijave as $prijava)
            <tr>
                <td>{{$prijava['ime']}}</td>
                <td>{{$prijava['prezime']}}</td>
                <td>{{$prijava['email']}}</td>
                <td>{{$prijava['oib']}}</td>
                <td>{{$prijava['vrijeme']}}</td>
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