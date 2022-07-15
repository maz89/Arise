


<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('dashboard')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
                    </span>
            <span class="logo-lg">
                        <img src="{{asset('assets/images/logo.png')}}" alt="" height="100">
                    </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('dashboard')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="22">
                    </span>
            <span class="logo-lg">
                        <img src="{{asset('assets/images/logo.png')}}" alt="" height="100">
                    </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">DASHBOARD</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('dashboard')}}" >
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard</span>
                    </a>

                </li> <!-- end Dashboard Menu -->

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">HR</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('employe_list')}}" >
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Employees </span>
                       
                    </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('contract_list')}}" >
                        <i class="ri-layout-3-line"></i> <span data-key="t-layouts">Contracts </span>

                        
                    </a>

                </li> <!-- end Dashboard Menu -->


                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('position_list')}}" >
                        <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Jobs </span>
                    </a>

                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('assignment_list')}}" >
                        <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Assignments </span>
                    </a>

                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('immunization_list')}}" >
                        <i class="ri-pages-line"></i> <span data-key="t-pages">Immunizations</span>
                    </a>

                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Admin</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#travelers" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
                        <i class="ri-compasses-2-line"></i> <span data-key="t-icons">Travelers </span>
                    </a>
                    <div class="collapse menu-dropdown" id="travelers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('traveler_list')}}" class="nav-link" data-key="t-remix">Travelers</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('visa_list')}}" class="nav-link" data-key="t-boxicons">Visas </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('permit_list')}}" class="nav-link" data-key="t-material-design">Permits </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('arrival_list')}}" class="nav-link" data-key="t-line-awesome">Arrivals</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('departure_list')}}" class="nav-link" data-key="t-feather">Departures </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('task_list')}}" >
                        <i class="ri-pages-line"></i> <span data-key="t-pages">Tasks </span>
                    </a>

                </li>


                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">HR Configurations</span></li>



                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarIcons" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
                        <i class="ri-compasses-2-line"></i> <span data-key="t-icons">Geographies</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarIcons">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('continent_list')}}" class="nav-link" data-key="t-remix">Continents</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('region_list')}}" class="nav-link" data-key="t-boxicons">Regions </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('countrie_list')}}" class="nav-link" data-key="t-material-design">Countries </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('prefecture_list')}}" class="nav-link" data-key="t-line-awesome">Prefectures</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('coutume_list')}}" class="nav-link" data-key="t-feather">Traditions </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#vaccine" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
                        <i class="ri-compasses-2-line"></i> <span data-key="t-icons">Vaccines </span>
                    </a>
                    <div class="collapse menu-dropdown" id="vaccine">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('disease_list')}}" class="nav-link" data-key="t-remix">Diseases</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('vaccine_list')}}" class="nav-link" data-key="t-boxicons">Vaccines </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#others" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarIcons">
                        <i class="ri-admin-line"></i> <span data-key="t-icons">Others  </span>
                    </a>
                    <div class="collapse menu-dropdown" id="others">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{route('departement_list')}}" class="nav-link" data-key="t-remix">Departments</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('business_list')}}" class="nav-link" data-key="t-boxicons">Business </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('niveau_list')}}" class="nav-link" data-key="t-boxicons">Levels </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('nature_list')}}" class="nav-link" data-key="t-boxicons">Natures </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('contract_type_list')}}" class="nav-link" data-key="t-boxicons">Contract type </a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Users </span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{route('utilisateur_list')}}" >
                        <i class="ri-pages-line"></i> <span data-key="t-pages">Users  </span>
                    </a>

                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
