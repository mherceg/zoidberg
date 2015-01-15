<ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">

                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        
                        @foreach($pm_topbar as $ppp)
                                <li>
                                    <a href="#">
                                        <div>
                                            <strong>{{$ppp->sender->prezime}}, {{$ppp->sender->ime}}</strong>
                                            <span class="pull-right text-muted">
                                                <em>{{$ppp->vrijeme}}</em>
                                            </span>
                                        </div>
                                        <div>{{$ppp->naslov}}</div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                @endforeach
                        <li>
                            <a class="text-center" href="{{url('admin/poruke-administracija')}}">
                                <strong>Pogledaj sve poruke</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{url('/home')}}"><i class="fa fa-home fa-fw"></i> Početna stranica</a>
                        </li>
                        <li><a href="{{url('admin/profil')}}"><i class="fa fa-user fa-fw"></i> Korisničke postavke</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Odjava</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>