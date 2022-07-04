@extends('layout.app')

@section('titre')
    Departures - List

@endsection


@section('css')

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}" />
@endsection




@section('contenu')



    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-5 col-5">
                    <h4 class="page-title">Departures </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addDeparture"><i class="fa fa-plus"></i> Add Departure</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th>Traveler   </th>
                                <th>Date   </th>
                                <th>Flight  </th>
                                <th>Border  </th>



                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $departures as $departure )
                                <tr>
                                    <td data-id="{{$departure->id}}">{{ $i++ }}</td>

                                    <td>  {{ $departure->traveler->firstname .' '.$departure->traveler->lastname }}</td>


                                    <td>


                                        {{ \Carbon\Carbon::parse($departure->validity)->translatedFormat('d F Y') }}


                                    </td>



                                    <td>  {{ $departure->flight }}</td>
                                    <td>  {{ $departure->border }}</td>



                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierDeparture" href="#"><i class="fa fa-pencil m-r-5"></i> Edit </a>



                                                <a class="dropdown-item supprimerDeparture" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Delete </a>



                                            </div>
                                        </div>
                                    </td>
                                </tr>


                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        @include('departure.modal')

    </div>


@endsection



@section('js')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



    <script>


        jQuery(document).ready(function(){



            $( "#annulerDeparture" ).click(function( event ) {
                event.preventDefault();


                fermerDeparture()
            });


            $( "#updateDeparture" ).click(function( event ) {
                event.preventDefault();


                updateDeparture()
            });


            $( "#ajouterDeparture" ).click(function( event ) {
                event.preventDefault();


                ajouterDeparture()
            });


            $( ".modifierDeparture" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierDeparture(id)
            });


            $( ".supprimerDeparture" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                deleteConfirmation(id)
            });

            clearData()

        });

        function clearData() {

            $('#date_departure').val('');
            $('#flight').val('');
            $('#border').val('');
            $('#traveler_id').val('');


            $('#erreurDate_departure').text('');
            $('#erreurFlight').text('');
            $('#erreurBorder').text('');
            $('#erreurTraveler_id').text('');



            $("#ajouterDeparture").show();
            $("#updateDeparture").hide();

        }



        //------------------------ fonction d' ajout de Departure
        function ajouterDeparture() {

            let allValid = true;
            let date_departure =  $('#date_departure').val();
            let flight =  $('#flight').val();
            let border =  $('#border').val();
            let traveler_id = parseInt($('#traveler_id').val()) ;



            if(date_departure ==='')
            {
                $('#erreurDate_departure').text("Required " );
                allValid = false;

            }if(flight ==='')
            {
                $('#erreurFlight').text("Required " );
                allValid = false;

            }if(border ==='')
            {
                $('#erreurBorder').text("Required " );
                allValid = false;

            }if(traveler_id ===0  )
            {
                $('#erreurTraveler_id').text("Required " );
                allValid = false;

            }




            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('departure_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        date_departure:date_departure,
                        flight:flight,
                        border:border,
                        traveler_id:traveler_id,

                    } ,

                    success: function(data) {


                        if(data.data.isValid)
                        {
                            $('#addDeparture').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Entry added ',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {

                            $('#erreurDate_departure').text(data.data.erreurDate_departure);

                            $('#erreurFlight').text(data.data.erreurFlight);
                            $('#erreurBorder').text(data.data.erreurBorder);
                            $('#erreurTraveler_id').text(data.data.erreurTraveler_id);

                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }

        //------------------------ fonction de modification du Departure
        function modifierDeparture(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/departures/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Entry edited');

                        $('#date_departure').val(data.date_departure);
                        $('#flight').val(data.flight);
                        $('#border').val(data.border);
                        $('#traveler_id').val(data.traveler_id);




                        $('#idDeparture').val(data.id);

                        $("#ajouterDeparture").hide();
                        $("#updateDeparture").show();

                        $('#addDeparture').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updateDeparture() {

            let allValid = true;
            let date_departure =  $('#date_departure').val();
            let flight =  $('#flight').val();
            let border =  $('#border').val();
            let traveler_id =  $('#traveler_id').val();

            let id =    $('#idDeparture').val();



            if(date_departure ==='')
            {
                $('#erreurDate_departure').text("Required" );
                allValid = false;

            }if(flight ==='')
            {
                $('#erreurFlight').text("Required" );
                allValid = false;

            }if(border ==='')
            {
                $('#erreurBorder').text("Required" );
                allValid = false;

            }if(date_departure ==='')
            {
                $('#erreurTraveler_id').text("Required" );
                allValid = false;

            }





            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/departures/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        date_departure:date_departure,
                        flight:flight,
                        border:border,
                        traveler_id:traveler_id,

                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addDeparture').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Entry edited',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurDate_departure').text(data.data.erreurDate_departure);

                            $('#erreurFlight').text(data.data.erreurFlight);
                            $('#erreurBorder').text(data.data.erreurBorder);
                            $('#erreurTraveler_id').text(data.data.erreurTraveler_id);


                        }

                    },

                    error: function(data) {

                        console.log(data);



                    }



                });

            }



        }



        //------------------------ fonction de suppression de Annee

        function deleteConfirmation(id) {
            Swal.fire({
                title: "Do you really want to delete this entry? ",
                icon: 'question',
                text: "",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                reverseButtons: !0
            }).then(function (e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{url('/departures/delete')}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {
                            if (results.success === true) {
                                Swal.fire("Succès", results.message, "success");
                                // refresh page after 2 seconds
                                setTimeout(function(){
                                    location.reload();
                                },2000);
                            } else {
                                Swal.fire("Erreur!", results.message, "error");
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            }, function (dismiss) {
                return false;
            })
        }

        //------------------------ fonction de fermeture de popup

        function fermerDeparture() {

            clearData();

            $('#myModalLabel').text('Add Departure');
            $('#addDeparture').modal('toggle');


        }


    </script>
@endsection
