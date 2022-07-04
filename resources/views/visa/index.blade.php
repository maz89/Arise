@extends('layout.app')

@section('titre')
    Visas - List

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
                    <h4 class="page-title">visas </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addVisa"><i class="fa fa-plus"></i> Add Visa</a>
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
                                <th>Validity </th>
                                <th>Expiry </th>

                                <th>Days to expiry</th>

                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $visas as $visa )
                                <tr>
                                    <td data-id="{{$visa->id}}">{{ $i++ }}</td>
                                    <td>  {{ $visa->traveler->firstname .' '.$visa->traveler->lastname }}</td>


                                    <td>


                                        {{ \Carbon\Carbon::parse($visa->validity)->translatedFormat('d F Y') }}


                                    </td>

                                    <td>


                                        {{ \Carbon\Carbon::parse($visa->expiry)->translatedFormat('d F Y') }}


                                    </td>


                                    <td>



                                    </td>

                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierVisa" href="#"><i class="fa fa-pencil m-r-5"></i> Edit </a>



                                                <a class="dropdown-item supprimerVisa" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Delete </a>



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


        @include('visa.modal')

    </div>


@endsection



@section('js')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



    <script>


        jQuery(document).ready(function(){



            $( "#annulerVisa" ).click(function( event ) {
                event.preventDefault();


                fermerVisa()
            });


            $( "#updateVisa" ).click(function( event ) {
                event.preventDefault();


                updateVisa()
            });


            $( "#ajouterVisa" ).click(function( event ) {
                event.preventDefault();


                ajouterVisa()
            });


            $( ".modifierVisa" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierVisa(id)
            });


            $( ".supprimerVisa" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                deleteConfirmation(id)
            });

            clearData()

        });

        function clearData() {

            $('#traveler_id').val('');
            $('#validity').val('');
            $('#expiry').val('');


            $('#erreurTraveler').text('');
            $('#erreurValidity').text('');
            $('#erreurExpiry').text('');



            $("#ajouterVisa").show();
            $("#updateVisa").hide();

        }



        //------------------------ fonction d' ajout de Continent
        function ajouterVisa() {

            let allValid = true;
            let traveler_id = parseInt($('#traveler_id').val());
            let validity =  $('#validity').val();
            let expiry =  $('#expiry').val();



            if(traveler_id ==='')
            {
                $('#erreurTraveler').text("Required " );
                allValid = false;

            }
            if(validity ==='')
            {
                $('#erreurValidity').text("Required " );
                allValid = false;

            }if(expiry ==='')
            {
                $('#erreurExpiry').text("Required " );
                allValid = false;

            }




            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('visa_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        traveler_id:traveler_id,
                        validity:validity,
                        expiry:expiry,

                    } ,

                    success: function(data) {

                        if(data.data.isValid)
                        {
                            $('#addVisa').modal('toggle');

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


                            $('#erreurTraveler').text(data.data.erreurTraveler);


                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }

        //------------------------ fonction de modification


        function modifierVisa(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/visas/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Edit visa');

                        $('#traveler_id').val(data.traveler_id);
                        $('#validity').val(data.validity);
                        $('#expiry').val(data.expiry);




                        $('#idVisa').val(data.id);

                        $("#ajouterVisa").hide();
                        $("#updateVisa").show();

                        $('#addVisa').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updateVisa() {

            let allValid = true;
            let traveler_id =  $('#traveler_id').val();
            let validity =  $('#validity').val();
            let expiry =  $('#expiry').val();

            let id =    $('#idVisa').val();



            if(traveler_id ==='')
            {
                $('#erreurTraveler').text("Required " );
                allValid = false;
            }
            if(validity ==='')
            {
                $('#erreurValidity').text("Required " );
                allValid = false;
            }
            if(expiry ==='')
            {
                $('#erreurExpiry').text("Required " );
                allValid = false;
            }





            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/visas/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        traveler_id:traveler_id,
                        validity:validity,
                        expiry:expiry,
                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addVisa').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Done',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurTraveler').text(data.data.erreurTraveler);


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
                title: "Do you really want to delete this entry ?? ",
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
                        url: "{{url('/visas/delete')}}/" + id,
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

        function fermerVisa() {

            clearData();

            $('#myModalLabel').text('Add visa');
            $('#addVisa').modal('toggle');


        }


    </script>
@endsection
