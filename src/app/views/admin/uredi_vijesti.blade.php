
@extends('admin.main')


@section('body')
	<h1 class="page-header">Uređivanje vijesti</h1>
	<?php $vijesti = array() ?>
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
                                            	 		<td>{{$vijest->naziv}}</td>
                                            	 		<td>{{$vijest->datum}}</td>
                                            	 		<td>{{$vijest->autor}}</td>

										            	<td>
											            	<div class="btn-group">
							                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							                                        Opcije
							                                        <span class="caret"></span>
							                                    </button>
							                                    <ul class="dropdown-menu pull-right" role="menu">
							                                        <li><a href="#">Uredi</a>
							                                        </li>
							                                        <li><a href="#">Sakrij</a>
							                                        </li>
							                                        <li><a href="#">Objavi</a>
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