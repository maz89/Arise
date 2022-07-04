@extends('layout.app')

@section('titre')
    Arrivals - List

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
                    <h4 class="page-title">Arrivals </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addArrival"><i class="fa fa-plus"></i> Add Arrival</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                            <tr>
                                <th style="width: 5%">#</th>

                                <th>Traveler  </th>
                                <th>Date   </th>
                                <th>Flight   </th>
                                <th>Border  </th>



                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $arrivals as $arrival )
                                <tr>
                                    <td data-id="{{$arrival->id}}">{{ $i++ }}</td>

                                    <td>  {{ $arrival->traveler->firstname .' '.$arrival->traveler->lastname }}</td>



                                    <td>


                                        {{ \Carbon\Carbon::parse($arrival->date_arrival)->translatedFormat('d F Y') }}


                                    </td>
                                    <td>  {{ $arrival->flight }}</td>
                                    <td>  {{ $arrival->border }}</td>



                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierArrival" href="#"><i class="fa fa-pencil m-r-5"></i> Edit </a>



                                                <a class="dropdown-item supprimerArrival" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Delete </a>



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


        @include('arrival.modal')

    </div>


@endsection



@section('js')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



    <script>


        jQuery(document).ready(function(){



            $( "#annulerArrival" ).click(function( event ) {
                event.preventDefault();


                fermerArrival()
            });


            $( "#updateArrival" ).click(function( event ) {
                event.preventDefault();


                updateArrival()
            });


            $( "#ajouterArrival" ).click(function( event ) {
                event.preventDefault();


                ajouterArrival()
            });


            $( ".modifierArrival" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierArrival(id)
            });


            $( ".supprimerArrival" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                deleteConfirmation(id)
            });

            clearData()

        });

        function clearData() {

            $('#date_arrival').val('');
            $('#flight').val('');
            $('#border').val('');
            $('#traveler_id').val('');


            $('#erreurDate_arrival').text('');
            $('#erreurFlight').text('');
            $('#erreurBorder').text('');
            $('#erreurTraveler_id').text('');



            $("#ajouterArrival").show();
            $("#updateArrival").hide();

        }



        //------------------------ fonction d' ajout de Arrival
        function ajouterArrival() {

            let allValid = true;
            let date_arrival =  $('#date_arrival').val();
            let flight =  $('#flight').val();
            let border =  $('#border').val();
            let traveler_id =  parseInt($('#traveler_id').val()) ;



            if(date_arrival ==='')
            {
                $('#erreurDate_arrival').text("Required " );
                allValid = false;

            }if(flight ==='')
            {
                $('#erreurflight').text("Required " );
                allValid = false;

            }if(border ==='')
            {
                $('#erreurBorder').text("Required " );
                allValid = false;

            }if(traveler_id === 0)
            {
                $('#erreurTraveler_id').text("Required " );
                allValid = false;

            }




            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('arrival_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        date_arrival:date_arrival,
                        flight:flight,
                        border:border,
                        traveler_id:traveler_id,

                    } ,

                    success: function(data) {


                        if(data.data.isValid)
                        {
                            $('#addArrival').modal('toggle');

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

                            $('#erreurDate_arrival').text(data.data.erreurDate_arrival);
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

        //------------------------ fonction de modification du Arrival
        function modifierArrival(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/arrivals/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Entry edited');

                        $('#date_arrival').val(data.date_arrival);
                        $('#flight').val(data.flight);
                        $('#border').val(data.border);
                        $('#traveler_id').val(data.traveler_id);




                        $('#idArrival').val(data.id);

                        $("#ajouterArrival").hide();
                        $("#updateArrival").show();

                        $('#addArrival').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updateArrival() {

            let allValid = true;
            let date_arrival =  $('#date_arrival').val();
            let flight =  $('#flight').val();
            let border =  $('#border').val();
            let traveler_id =  $('#traveler_id').val();

            let id =    $('#idArrival').val();



            if(date_arrival ==='')
            {
                $('#erreurDate_arrival').text("Required" );
                allValid = false;

            }if(flight ==='')
            {
                $('#erreurFlight').text("Required" );
                allValid = false;

            }if(border ==='')
            {
                $('#erreurBorder').text("Required" );
                allValid = false;

            }if(date_arrival ==='')
            {
                $('#erreurTraveler_id').text("Required" );
                allValid = false;

            }





            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/arrivals/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        date_arrival:date_arrival,
                        flight:flight,
                        border:border,
                        traveler_id:traveler_id,

                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addArrival').modal('toggle');

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
                            $('#erreurDate_arrival').text(data.data.erreurDate_arrival);
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
                        url: "{{url('/arrivals/delete')}}/" + id,
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

        function fermerArrival() {

            clearData();

            $('#myModalLabel').text('Add Arrival');
            $('#addArrival').modal('toggle');


        }


    </script>
@endsection
