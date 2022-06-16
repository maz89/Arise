@extends('layout.app')

@section('title')

Dashboard

@endsection

@section('css')



@endsection





@section('contenu')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">

                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>50</h3>
                            <span class="widget-title2">Employees <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>5</h3>
                            <span class="widget-title3">Business <i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
                    <div class="dash-widget">
                        <span class="dash-widget-bg4"><i class="fa fa-bookmark" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>10</h3>
                            <span class="widget-title4">Departments<i class="fa fa-check" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">Upcoming Birthday</h4> <a href="appointments.html" class="btn btn-primary float-right">View all</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="d-none">
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Birthday</th>
                                        <th>Age</th>
                                        <th class="text-right">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td style="min-width: 200px;">
                                            <a class="avatar" href="profile.html">B</a>
                                            <h2><a href="profile.html">Bernardo Galaviz </a></h2>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">birthday</h5>
                                            <p>10.5.2022</p>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Age</h5>
                                            <p>35</p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td style="min-width: 200px;">
                                            <a class="avatar" href="profile.html">B</a>
                                            <h2><a href="profile.html">Bernardo Galaviz </a></h2>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">birthday</h5>
                                            <p>10.5.2022</p>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Age</h5>
                                            <p>35</p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td style="min-width: 200px;">
                                            <a class="avatar" href="profile.html">B</a>
                                            <h2><a href="profile.html">Bernardo Galaviz </a></h2>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">birthday</h5>
                                            <p>10.5.2022</p>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Age</h5>
                                            <p>35</p>
                                        </td>

                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="card member-panel">
                        <div class="card-header bg-white">
                            <h4 class="card-title mb-0">Managers</h4>
                        </div>
                        <div class="car">
                            <ul class="contact-list">
                                <li>
                                    <div class="contact-cont">
                                        <div class="float-left user-img m-r-10">
                                            <a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status online"></span></a>
                                        </div>
                                        <div class="contact-info">
                                            <span class="contact-name text-ellipsis">John Doe</span>
                                            <span class="contact-date">IT, IZ</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-cont">
                                        <div class="float-left user-img m-r-10">
                                            <a href="profile.html" title="Richard Miles"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status offline"></span></a>
                                        </div>
                                        <div class="contact-info">
                                            <span class="contact-name text-ellipsis">Richard Miles</span>
                                            <span class="contact-date">MD,fgh</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-cont">
                                        <div class="float-left user-img m-r-10">
                                            <a href="profile.html" title="John Doe"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status away"></span></a>
                                        </div>
                                        <div class="contact-info">
                                            <span class="contact-name text-ellipsis">John Doe</span>
                                            <span class="contact-date">BMBS, SDFGHJ</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer text-center bg-white">
                            <a href="#" class="text-muted">View all Managers</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">Ending contracts</h4> <a href="appointments.html" class="btn btn-primary float-right">View all</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="d-none">
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>End</th>
                                        <th>day</th>
                                        <th class="text-right">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td style="min-width: 200px;">
                                            <a class="avatar" href="profile.html">B</a>
                                            <h2><a href="profile.html">Bernardo Galaviz </a></h2>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">End date</h5>
                                            <p>10.5.2022</p>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Day</h5>
                                            <p>Ends in 5 days</p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td style="min-width: 200px;">
                                            <a class="avatar" href="profile.html">B</a>
                                            <h2><a href="profile.html">Bernardo Galaviz </a></h2>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">End date</h5>
                                            <p>15.5.2022</p>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Day</h5>
                                            <p>Ends in 10 days</p>
                                        </td>

                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">Ending probation periods</h4> <a href="appointments.html" class="btn btn-primary float-right">View all</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead class="d-none">
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>End</th>
                                        <th>day</th>
                                        <th class="text-right">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td style="min-width: 200px;">
                                            <a class="avatar" href="profile.html">B</a>
                                            <h2><a href="profile.html">Bernardo Galaviz </a></h2>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">End date</h5>
                                            <p>10.5.2022</p>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Day</h5>
                                            <p>Ends in 5 days</p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td style="min-width: 200px;">
                                            <a class="avatar" href="profile.html">B</a>
                                            <h2><a href="profile.html">Bernardo Galaviz </a></h2>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">End date</h5>
                                            <p>15.5.2022</p>
                                        </td>
                                        <td>
                                            <h5 class="time-title p-0">Day</h5>
                                            <p>Ends in 10 days</p>
                                        </td>

                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-8 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block">NEW JOINERS </h4> <a href="patients.html" class="btn btn-primary float-right">View all</a>
                        </div>
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table mb-0 new-patient-table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt="">
                                            <h2>John Doe</h2>
                                        </td>
                                        <td>10.05.2022</td>
                                        <td><button class="btn btn-primary btn-primary-one float-right">HR, ICD</button></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt="">
                                            <h2>John Doe</h2>
                                        </td>
                                        <td>10.05.2022</td>
                                        <td><button class="btn btn-primary btn-primary-one float-right">HR, ICD</button></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img width="28" height="28" class="rounded-circle" src="assets/img/user.jpg" alt="">
                                            <h2>John Doe</h2>
                                        </td>
                                        <td>10.05.2022</td>
                                        <td><button class="btn btn-primary btn-primary-one float-right">HR, ICD</button></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection

@section('js')

    <script src="{{asset('assets/js/Chart.bundle.js')}}"></script>
    <script src="{{asset('assets/js/chart.js')}}"></script>

@endsection


