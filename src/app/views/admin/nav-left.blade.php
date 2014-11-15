
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
                                    <a href="{{ url('/admin/vijesti/add') }}">Dodaj novu vijest</a>
                                </li>

                                <li>
                                    <a href="{{url('/admin/vijesti/edit')}}">Uređivanje vijesti</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="{{url('/admin/osnovnipodaci')}}"><i class="fa fa-info-circle fa-fw"></i> Uređivanje osnovnih podaci</a>
                           
                        </li>



                        <li>
                            <a href="#"><i class="fa fa-envelope fa-fw"></i> Privatne poruke<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">Iz administracije</a>
                                </li>
                                <li>
                                    <a href="morris.html">Od građana</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-calendar fa-fw"></i> Akcije</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-file-o fa-fw"></i> Doukmenti</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Upravljanje korisnicima<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Dodavanje novih članova</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Uređivanje ovlasti</a>
                                </li>   
                                <li>
                                    <a href="buttons.html">Uređivanje profila</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->