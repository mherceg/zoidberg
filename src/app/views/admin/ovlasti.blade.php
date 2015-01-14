@extends('admin.main')


@section('body')
							<h1 class="page-header">Uređivanje ovlasti</h1>
                            <form method="POST" action="{{url('admin/ovlasti')}}" accept-charset="UTF-8" class="form-signup">
       
                                        <div class="form-group">
                                            <label>Ime ovlasti</label>
                                            <input class="form-control" value="" name="ime">
                                        </div>
                                        <div class="form-group">
                                            <label>Oznaka modula</label>
                                            <input class="form-control" value="" name="oznaka">
                                        </div>
                                        <div class="form-group">
                                            <label>Oznaka ovlasti</label>
                                            <input class="form-control" value="" name="ovlast">
                                        </div>
                                        <div class="text-center">
                                        <button type="submit" class="btn btn-large btn-danger btn-block">Spremi</button>
                                    </div>
                                    <input type="hidden" value="sub" name="tip" />
                                </form>

                                <br/>


                            <h1 class="page-header">Dodaj novi tip korisnika</h1>


                            <form method="POST" action="{{url('admin/ovlasti')}}" accept-charset="UTF-8" class="form-signup">
       
                                        <div class="form-group">
                                            <label>Naziv tipa</label>
                                            <input class="form-control" value="" name="nazivNovi">
                                        </div>
                                        <div class="form-group">
                                            <label>Minimalna datotečna dozvola</label>
                                            <input class="form-control" value="" name="defDoz">
                                        </div>
                                        <div class="form-group">
                                            <label>Titula</label>
                                            <input class="form-control" value="" name="titula">
                                        </div>
                                        <div class="text-center">
                                        <button type="submit" class="btn btn-large btn-danger btn-block">Spremi</button>
                                    </div>

                                    <input type="hidden" value="nov" name="tip" />
                                </form>

                                <br/>

                                <p><i><strong>Napomena:</strong> Za oznake modula se obratite dokumentaciji!</i></p>
@stop


@section('nav-top')
	@include('admin.nav-top')
@stop


@section('nav-sidebar')
	@include('admin.nav-left')
@stop