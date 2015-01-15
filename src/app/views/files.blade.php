@extends('main')

@section('mainbar')
                <section class="section">
                    <div class="section-inner">
                        <h6>Trenutni direktorij</h6>
            
                        <h2 class="heading">@if($currF->naziv == " "){{"(korijenski direktorij)"}}@else<a href="./dokumenti?fid={{$currF->root}}"><</a> {{$currF->naziv}}@endif</h2>

                        <div class="content">
                            Datoteke:
                            <ul>
                                <?php 
                                $dirtyHack = 0;
                                ?>
                                @foreach($currF->files as $f)
                                    @if($f->potrebna_dozvola <= $ovlastUsera)
                                    <?php $dirtyHack = 1; ?>
                                    <li><a href="./{{$f->lokacija.'/'.$f->naziv}}">{{$f->naziv}}</a></li>
                                    @endif
                                @endforeach
                                @if($dirtyHack == 0)
                                    <li>Ne postoje datoteke u ovom direktoriju!</li>
                                @endif
                            </ul>

                            Direktoriji:
                            <ul>
                                <?php 
                                $dirtyHack = 0;
                                ?>
                                @foreach($currF->djeca as $d)
                                    @if($d->shouldBeVisible())
                                    <?php $dirtyHack = 1; ?>
                                    <li><a href="./dokumenti?fid={{$d->id}}">{{$d->naziv}}</a></li>
                                    @endif
                                @endforeach
                                @if($dirtyHack == 0)
                                    <li>Ne postoje drugi direktoriji!</li>
                                @endif
                            </ul>
                        </div>

                    </div>
                </section>

                <section class="section">
                    <div class="section-inner">
                        <h6>Potraga za datotekom</h6>
                        
                        <div class="content">
                            <form method="POST" action="{{url('dokumenti').'?fid='.$currF->id}}" accept-charset="UTF-8">
       

                            <div class="form-group">
                                <label>Ime datoteke</label>
                                <input class="form-control" value="@if(isset($pretrag)){{$pretrag}}@endif" name="pretrag">
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-block btn-danger">Pretraži</button>
                            </div>

                            <br />
                            </from>
                        </div>

                    </div>

                    @if(isset($rezPret))
                    <div class="section-inner">
                        <h6>Rezultati</h6>
                        @if($rezPret->isEmpty())
                            <div class="content">
                                Nema rezultata!
                            </div>
                        @else
                        <div class="content">
                            <ul>
                                @foreach($rezPret as $r)
                                <li>
                                    <?php
                                        $a = substr($r->lokacija, 8);

                                        $a = (!empty($a)) ? ($a) : ('(korijenski_direktorij)');
                                    ?>
                                    <a href="#">{{$r->naziv}} ({{ $a }})</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                    </div>
                    @endif
                </section>
@stop

@section('sidebar')
	@include('nav')
@stop