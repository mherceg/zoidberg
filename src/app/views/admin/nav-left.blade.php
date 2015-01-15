
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="{{url('/admin/dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Pregled</a>
                        </li>
                        
                        <li>
                            <a href="{{url('/admin/vijesti')}}"><i class="fa fa-info-circle fa-fw"></i> Vijesti<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/admin/vijesti-dodaj') }}">Dodaj novu vijest</a>
                                </li>

                                <li>
                                    <a href="{{url('/admin/vijesti-uredi')}}">Uređivanje vijesti</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="{{url('/admin/osnovnipodaci')}}"><i class="fa fa-info-circle fa-fw"></i> Uređivanje osnovnih podataka</a>
                           
                        </li>

                        <li>
                            <a href="{{url('/admin/povijest')}}"><i class="fa fa-book fa-fw"></i> Uređivanje povijesti</a>
                           
                        </li>



                        <li>
                            <a href="#"><i class="fa fa-envelope fa-fw"></i> Privatne poruke<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/admin/poruke-administracija-posalji')}}">Pošalji novu poruku</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/poruke-administracija')}}">Iz administracije</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/poruke-gradjani')}}">Od građana</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="/admin/akcije"><i class="fa fa-calendar fa-fw"></i> Akcije<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/admin/akcije-dodaj') }}">Dodaj novu akciju</a>
                                </li>

                                <li>
                                    <a href="{{url('/admin/akcije-uredi')}}">Uređivanje akcija</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-o fa-fw"></i> Dokumenti<span class="fa arrow"></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/admin/datoteke/direktorij')}}">Dodaj direktorij</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/datoteke/datoteke')}}">Dodaj datoteku</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Upravljanje korisnicima<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('/admin/korisnici-dodaj')}}">Dodavanje novih članova</a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/ovlasti')}}">Uređivanje ovlasti</a>
                                </li>   
                                <li>
                                    <a href="{{url('/admin/korisnici-uredi')}}">Uređivanje korisnika</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        
                    </ul>
                </div>
            </div>
                <!-- /.sidebar-collapse -->