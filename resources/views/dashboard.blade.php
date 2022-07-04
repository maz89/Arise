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

                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg1"><i class="fa fa-user-o"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>

                                @php

                                    $total= App\Models\Employe::totalEmploye();

                                @endphp

                                {{$total}}



                            </h3>
                            <span class="widget-title1">Employees </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg3"><i class="fa fa-briefcase" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>

                                @php

                                    $total= App\Models\Business::totalBusiness();

                                @endphp

                                {{$total}}

                            </h3>
                            <span class="widget-title3">Business </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg4"><i class="fa fa-bookmark" aria-hidden="true"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>

                                @php

                                    $total= App\Models\Departement::totalDepartement();

                                @endphp

                                {{$total}}



                            </h3>
                            <span class="widget-title4">Departments</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="dash-widget">
                        <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                        <div class="dash-widget-info text-right">
                            <h3>

                                @php

                                    $total= App\Models\Position::totalPosition();

                                @endphp

                                {{$total}}



                            </h3>
                            <span class="widget-title2">Jobs </span>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title">
                                <h4>Diversity</h4>
                                {{--                                    <span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>--}}
                                {{--                              --}}
                            </div>
                            <canvas id="diversity" ></canvas>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title">
                                <h4>Gender</h4>
                                {{--                                    <span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>--}}
                                {{--                              --}}
                            </div>
                            <canvas id="gender" ></canvas>

                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="chart-title">
                                <h4>myChart</h4>
                                {{--                                    <span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>--}}
                                {{--                              --}}
                            </div>
                            <canvas id="myChart"></canvas>

                        </div>
                    </div>
                </div>
            </div>



            <div class="row">


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


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js')}}"></script>

    <script>


        new Chart(document.getElementById("diversity"), {
            type: 'pie',
            data: {
                labels: ["National", "Expatriate"],
                datasets: [{
                    label: "Chiffres en pourcentage ",
                    backgroundColor: ["#002060", "#dadada"],
                    data: [60.5,39.5]
                }]
            },

        });

    </script>

    <script>


        new Chart(document.getElementById("gender"), {
            type: 'pie',
            data: {
                labels: ["Male", "Female"],
                datasets: [{
                    label: "Chiffres en pourcentage ",
                    backgroundColor: ["#159aee", "#aa1c03"],
                    data: [73, 27]
                }]
            },

        });

    </script>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["AVC", "ICD", "IZ", "MIFA", "PLAN", "SOJA"],
                datasets: [{
                    data: [62,46,58,28,29,12],
                    label: "STAFF",
                    borderColor: "rgb(3,66,106)",
                    backgroundColor: "rgb(62,149,205,0.1)",
                    borderWidth:2
                }, {
                    data: [6,67,13,11,20,0],
                    label: "EXT",
                    borderColor: "rgb(172,13,3)",
                    backgroundColor:"rgb(196,88,80,0.1)",
                    borderWidth:2
                }
                ]
            },
        });
    </script>

@endsection


