
@extends('admin.main')


@section('body')
	<h1 class="page-header">Uređivanje vijesti</h1>

	<table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Naziv vijesti</th>
                                                    <th>Mali uvid vijesti</th>
                                                    <th>Datum vijesti</th>
                                                    <th>Autor vijesti</th>
                                                    <th>Uredi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                            	 @foreach($vijesti as $vijest)
                                            	 	<tr>
                                            	 		<td>
                                            	 			@if($vijest['objavljeno'] == 1)
                                            	 			✓ 
                                            	 			@endif

                                            	 			{{$vijest['naslov']}}</td>
                                            	 		<td>{{substr($vijest['sadrzaj'], 0, 50)}}
                                            	 			@if(strlen($vijest['sadrzaj'] > 50))
                                            	 				<br/>...
                                            	 			@endif

                                            	 		</td>
                                            	 		<td>{{$vijest['datum']}}</td>
                                            	 		<td>{{$vijest->autor->prezime}}, {{$vijest->autor->ime}}</td>

										            	<td>
											            	<div class="btn-group">
							                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							                                        Opcije
							                                        <span class="caret"></span>
							                                    </button>
							                                    <ul class="dropdown-menu pull-right" role="menu">
							                                        <li><a href="{{url('/admin/vijesti-dodaj?id='.$vijest['id'])}}">Uredi</a>
							                                        </li>
							                                        <li><a href="{{url('/admin/sakrij?id='.$vijest['id'])}}">Sakrij</a>
							                                        </li>
							                                        <li><a href="{{url('/admin/objavi?id='.$vijest['id'])}}">Objavi</a>
							                                        </li>
							                                    </ul>
						                                	</div>
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