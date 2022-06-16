@extends('layout.app')

@section('title')
    Nationality-Add

@endsection


@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}"/>
@endsection

@section('contenu')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add Employee</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Employee ID<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Birth Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="select">
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="form-control" type="password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Employee ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Joining Date <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone </label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="select">
                                        <option>Admin</option>
                                        <option>Doctor</option>
                                        <option>Nurse</option>
                                        <option>Laboratorist</option>
                                        <option>Pharmacist</option>
                                        <option>Accountant</option>
                                        <option>Receptionist</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="display-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="employee_active" value="option1" checked>
                                <label class="form-check-label" for="employee_active">
                                    Active
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="employee_inactive" value="option2">
                                <label class="form-check-label" for="employee_inactive">
                                    Inactive
                                </label>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Create Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('js')
    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

    <script>

        jQuery(document).ready(function () {

            $("#addNationality").click(function (event) {
                event.preventDefault();
                addNationality()
            });

        });

        //------------------------ fonction d'ajout d'un business
        function addNationality() {

            let allValid = true;

            let name = $('#name').val();


            if (name === '') {
                $('#erreurName').text("Enter the business name ");
                allValid = false;

            }


            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('nationality_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {

                        name: name,
                    },

                    success: function (data) {
                        console.log(data.data)
                        if (data.data.isValid) {
                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: '  Success entry added',
                                    showConfirmButton: false,
                                },

                                setTimeout(function () {
                                    location.href = '{{route('nationality_list')}}';
                                }, 2000));

                        } else {
                            $('#erreurName').text(data.erreurName);

                        }


                    },

                    error: function (data) {

                        console.log(data);

                    }


                });

            }


        }


    </script>
@endsection
