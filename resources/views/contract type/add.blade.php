@extends('layout.app')

@section('title')
   Contract Type Add

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
                    <h4 class="page-title">Add Contract type </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form>


                        <div class="form-group">
                            <label>Name </label>
                            <input class="form-control" type="text" id="title" name="title">

                            <span class="text-danger" id="erreurName"></span>
                        </div>


                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn" id="addContract_type">add contract type</button>
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

            $("#addContract_type").click(function (event) {
                event.preventDefault();
                addContract_type()
            });

        });

        //------------------------ fonction d'ajout d'un business
        function addContract_type() {

            let allValid = true;

            let name = $('#name').val();



            if (name === '') {
                $('#erreurName').text("Enter the contract name ");
                allValid = false;

            }


            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('contract_type_store')}}",
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
                                    location.href = '{{route('contract_type_list')}}';
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
