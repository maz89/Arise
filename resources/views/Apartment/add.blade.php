@extends('layout.app')

@section('title')
    Apartment-Add

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
                    <h4 class="page-title">Add Apartment </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form>
                        <div class="form-group">
                            <label>nb_rooms </label>
                            <input class="form-control" type="text" id="code" name="code">

                            <span class="text-danger" id="erreurRooms"></span>
                        </div>

                        <div class="form-group">
                            <label>num_apartment </label>
                            <input class="form-control" type="text" id="title" name="title">

                            <span class="text-danger" id="erreurNum_apartment"></span>
                        </div>
                        <div class="form-group">
                            <label>building_id </label>
                            <input class="form-control" type="text" id="title" name="title">

                            <span class="text-danger" id="erreurBuilding"></span>
                        </div>


                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn" id="addApartment">add apartment</button>
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

            $("#addApartment").click(function (event) {
                event.preventDefault();
                addApartment()
            });

        });

        //------------------------ fonction d'ajout d'un business
        function addApartment() {

            let allValid = true;
            let nb_rooms = $('#nb_rooms').val();
            let num_apartment = $('#num_apartment').val();
            let building_id = $('#building_id').val();


            if (nb_rooms === '') {
                $('#erreurChambre').text("Enter Rooms");
                allValid = false;

            }
            if (num_apartment === '') {
                $('#erreurNumero').text("Enter the apartment number ");
                allValid = false;

            }

            if (building_id === '') {
                $('#erreurBuilding').text("Enter the building");
                allValid = false;

            }


            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('business_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        nb_rooms: nb_rooms,
                        num_apartment: num_apartment,
                        building_id: building_id,
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
                                    location.href = '{{route('apartment_list')}}';
                                }, 2000));

                        } else {
                            $('#erreurChambre').text(data.$erreurNumero);

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
