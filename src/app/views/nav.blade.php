                <aside class="list aside section">
                    <div class="section-inner">
                        <h2 class="heading">Navigacija
                            @if(Auth::check())
                                ({{Auth::user()->prezime}}, {{ Auth::user()->ime}})
                            @endif
                        </h2>
                        <div class="content">
                            <ul class="list-unstyled">
                                <li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Početna stranica i vijesti


                                </a></li>
                                <li><a href="{{ url('podaci') }}"><i class="fa fa-info-circle"></i> Podaci o ministarstvu</a></li>
                                <li><a href="{{ url('popis_djelatnika') }}"><i class="fa fa-users"></i> Djelatnici ministarstva</a></li>
                                <li><a href="{{ url('akcije') }}"><i class="fa fa-calendar"></i> Akcije</a></li>
                                <li><a href="{{url('dokumenti')}}?fid=0"><i class="fa fa-folder"></i> Dokumenti</a></li>
                                <li><a href="{{url('home/povijest')}}"><i class="fa fa-book"></i> Povijest ministarstva</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> Kontakt</a></li>
                                <hr class="divider" />
                                @if(!Auth::check())
                                <li><a href="{{ url('login') }}"><i class="fa fa-sign-in"></i> Prijava</a></li>
                                @endif

                                @if(Auth::check())
                                <li><a href="#"><i class="fa fa-envelope-o"></i> Privatne poruke</a></li>
                                <li><a href="#"><i class="fa fa-wrench"></i> Postavke korisničkog računa</a></li>
                                <li><a href="{{url('/admin')}}"><i class="fa fa-dashboard"></i> Administracijsko sučelje</a></li>
                                <li><a href="{{url('logout')}}"><i class="fa fa-sign-out"></i> Odjava</a></li>
                                @endif
                            </ul>
                        </div><!--//content-->
                    </div><!--//section-inner-->
                </aside><!--//section-->

                <aside class="list aside section">
                    <div class="section-inner">
                        <h2 class="heading">Akcije</h2>
                        <div class="content">
                            <ul class="list-unstyled">
                                @foreach($nav_akcije as $akcija)
                                    <li><i class="fa fa-calendar"></i> <a href="{{action('EventsController@getDetalji', $akcija->id)}}" >{{ $akcija->naziv }}</a></li>
                                @endforeach
                            </ul>
                        </div><!--//content-->
                    </div><!--//section-inner-->
                </aside><!--//section-->