@extends('admin.main')


@section('body')
    <h1 class="page-header">Uređivanje akcija</h1>

    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>Naziv akcije</th>
            <th>Skraćeni opis</th>
            <th>Maksimalan broj prijava</th>
            <th>Trenutno prijavljeni</th>
            <th>Uredi</th>
        </tr>
        </thead>

        <tbody>
        @foreach($akcije as $akcija)
            <tr>
                <td>
                    {{$akcija['naziv']}}</td>
                <td>{{substr($akcija['opis'], 0, 50)}}
                    @if(strlen($akcija['opis'] > 50))
                        <br/>...
                    @endif

                </td>
                <td>{{$akcija['max_ljudi']}}</td>
                <td>
                    <a href="{{ action('AdminController@getPrijave', $akcija->id) }}">{{$akcija->prijavljeni()->count()}}</a>
                </td>

                <td>
                    <a href="{{ action('AdminController@getAkcijeDodaj') }}?id={{ $akcija->id }}">Uredi</a>
                </td>
            </tr>
        @endforeach
        <tr>
        </tr>
        </tbody>
    </table>
@stop


@section('nav-top')
    @include('admin.nav-top')
@stop


@section('nav-sidebar')
    @include('admin.nav-left')
@stop