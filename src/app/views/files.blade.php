@extends('main')

@section('mainbar')
                <section class="section">
                    <div class="section-inner">
                        <h6>Trenutni direktorij</h6>
                        <h2 class="heading">@if($currF->naziv == " "){{"(korijenski direktorij)"}}@else<a href="./dokumenti?fid={{$currF->root}}"><</a> {{$currF->naziv}}@endif</h2>

                        <div class="content">
                            Datoteke:
                            <ul>
                                @foreach($currF->files as $f)
                                    @if($f->potrebna_dozvola <= $ovlastUsera)
                                    <li><a href="./{{$f->lokacija.'/'.$f->naziv}}">{{$f->naziv}}</a></li>
                                    @endif
                                @endforeach
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
@stop

@section('sidebar')
	@include('nav')
@stop