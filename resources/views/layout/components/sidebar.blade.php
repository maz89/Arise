<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Admin </li>
                <li  class="@if($active == \App\Types\Menu::DASHBOARD) active @endif">
                    <a href="{{route('dashboard')}}" ><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                </li>


                <li class="submenu">
                    <a href="#"><i class="fa fa-user"></i> <span> HR  </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">

                        <li><a href="{{route('employe_list')}}" class="@if($active == \App\Types\Menu::EMPLOYEE) active @endif">Employees </a></li>
                        <li><a href="{{route('contract_list')}}" class="@if($active == \App\Types\Menu::CONTRACT) active @endif">Contract </a></li>
                        <li><a href="{{route('position_list')}}" class="@if($active == \App\Types\Menu::POSITION) active @endif">Job</a></li>
                        <li><a href="{{route('assignment_list')}}" class="@if($active == \App\Types\Menu::ASSIGNMENT) active @endif">Assignment</a></li>
                        <li><a href="{{route('immunization_list')}}" class="@if($active == \App\Types\Menu::IMMUNIZATION) active @endif">Immunizations </a></li>


                    </ul>
                </li>


                <li class="submenu">
                    <a href="#"><i class="fa fa-briefcase"></i> <span> Admin  </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">

                        <li><a href="{{route('traveler_list')}}" class="@if($active == \App\Types\Menu::TRAVELERS) active @endif">Travelers</a></li>
                        <li><a href="{{route('visa_list')}}" class="@if($active == \App\Types\Menu::VISA) active @endif">Visas </a> </li>
                        <li><a href="{{route('permit_list')}}" class="@if($active == \App\Types\Menu::PERMITS) active @endif">residence permits</a></li>
                        <li><a href="{{route('arrival_list')}}" class="@if($active == \App\Types\Menu::ARRIVALS) active @endif">Arrivals</a></li>
                        <li><a href="{{route('departure_list')}}" class="@if($active == \App\Types\Menu::DEPARTURE) active @endif">Departure</a></li>
                        <li><a href="{{route('task_list')}}" class="@if($active == \App\Types\Menu::TASKS) active @endif">Tasks </a></li>

                    </ul>
                </li>


                <li class="submenu">
                    <a href="#"><i class="fa fa-user"></i> <span> Configuration  </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">


                        <li><a href="{{route('continent_list')}}" class="@if($active == \App\Types\Menu::CONTINENT) active @endif">Continents</a></li>
                        <li><a href="{{route('region_list')}}" class="@if($active == \App\Types\Menu::REGION) active @endif">Regions </a></li>
                        <li><a href="{{route('countrie_list')}}" class="@if($active == \App\Types\Menu::COUNTRIES) active @endif">Countries</a></li>
                        <li><a href="{{route('prefecture_list')}}" class="@if($active == \App\Types\Menu::PREFECTURE) active @endif">Prefectures </a></li>
                        <li><a href="{{route('coutume_list')}}" class="@if($active == \App\Types\Menu::COUTUME) active @endif">Coutumes</a></li>
                        <li><a href="{{route('departement_list')}}" class="@if($active == \App\Types\Menu::DEPARTEMENT) active @endif">Department</a></li>
                        <li><a href="{{route('business_list')}}" class="@if($active == \App\Types\Menu::BUSINESS) active @endif">Business</a></li>
                        <li><a href="{{route('contract_type_list')}}" class="@if($active == \App\Types\Menu::CONTRACT_TYPE) active @endif">Contract type</a></li>
                        <li><a href="{{route('niveau_list')}}" class="@if($active == \App\Types\Menu::NIVEAUX) active @endif">Niveaux </a></li>

                        <li><a href="{{route('disease_list')}}" class="@if($active == \App\Types\Menu::DISEASE) active @endif">Disease</a></li>
                        <li><a href="{{route('vaccine_list')}}" class="@if($active == \App\Types\Menu::VACCINE) active @endif">Vaccine</a></li>
                        <li><a href="{{route('nature_list')}}" class="@if($active == \App\Types\Menu::NATURE) active @endif">Nature</a></li>



                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
