@extends('layout.app')

@section('title')
    Contract-Add

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
                    <h4 class="page-title">Add Contract</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form>
                        <div class="row">


                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date start <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date End <span class="text-danger">*</span></label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Probation</label>
                                    <input class="form-control" type="text">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Contract<span class="text-danger">*</span></label>
                                    <select class="select">
                                        <option>CDI</option>
                                        <option>Intern</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn" id="addContract">Add Contract </button>
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

            $("#addContract").click(function (event) {
                event.preventDefault();
                addContract()
            });

        });

        //------------------------ fonction d'ajout d'un business
        function addContract() {

            let allValid = true;
            let date_start = $('#date_start').val();
            let date_end= $('#date_end').val();
            let contract_type_id = $('#contract_type_id').val();


            if (date_start === '') {
                $('#erreurDate_start').text("Enter the Date");
                allValid = false;

            }
            if (date_end === '') {
                $('#erreurDate_end').text("Enter the Date");
                allValid = false;

            }

            if (contract_type_id === '') {
                $('#erreurContract_type_id').text("Chose de contract type");
                allValid = false;

            }


            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('contract_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        date_start: date_start,
                        date_end: date_end,
                        probation: probation,
                        contract_type_id: contract_type_id,

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
                                    location.href = '{{route('contract_list')}}';
                                }, 2000));

                        } else {
                            $('#erreurDate_start').text(data.erreurDate_end);

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
