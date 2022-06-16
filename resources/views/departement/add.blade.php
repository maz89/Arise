@extends('layout.app')

@section('title')
    Business-Add

@endsection


@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}"/>
@endsection

@section('contenu')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Add department </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form>


                        <div class="form-group">
                            <label>Name </label>
                            <input class="form-control" type="text" id="title" name="title">

                            <span class="text-danger" id="erreurTitle"></span>
                        </div>


                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn" id="addDepartement">add department</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('js')

    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

    <script>

        jQuery(document).ready(function () {

            $("#addDepartement").click(function (event) {
                event.preventDefault();
                addDepartement()
            });

        });

        //------------------------ fonction d'ajout d'un business
        function addDepartement() {

            let allValid = true;

            let title = $('#title').val();



            if (title === '') {
                $('#erreurTitle').text("Enter the department name ");
                allValid = false;

            }



            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('departement_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {

                        title: title,
                    },

                    success: function (data) {
                        console.log(data.data)
                        if (data.data.isValid) {
                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: '  Success!! entry added',
                                    showConfirmButton: false,
                                },

                                setTimeout(function () {
                                    location.href = '{{route('departement_list')}}';
                                }, 2000));

                        } else {
                            $('#erreurTitle').text(data.erreurTitle);

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
