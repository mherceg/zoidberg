@extends('main')

@section('mainbar')
                <section class="section">
                    <div class="section-inner">
                        <h2 class="heading">Kontaktiraj administraciju ministarstva</h2>
                        
                        <form method="POST" action="{{url('kontakt/spec').'?uid='.$uid}}" accept-charset="UTF-8">
       

                        <div class="form-group">
                            <label>Naslov</label>
                            <input class="form-control" value="" name="naslov">
                        </div>

                        <div class="content form-group">
                            <textarea class="form-control" rows="15" name="sadrzaj"></textarea>
                        </div>

                        <div class="form-group">
                            <label>Vaša e-mail adresa</label>
                            <input class="form-control" value="" name="mail">
                        </div>

                        <br />
                        <button class="btn btn-block btn-danger">Pošaji poruku</button>
                        </from>
                    </div>
                </section>
@stop

@section('sidebar')
	@include('nav')
@stop