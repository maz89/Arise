@extends('layout.app')

@section('title')
    Arrivals - List

@endsection


@section('css')

    <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <!--datatable css-->

    <link rel="stylesheet" href="{{asset('assets/datatables/1.11.5/css/dataTables.bootstrap5.min.css')}}" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="{{asset('assets/datatables/responsive/2.2.9/css/responsive.bootstrap.min.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/datatables/buttons/2.2.2/css/buttons.dataTables.min.css')}}">



@endsection




@section('contenu')





        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Arrivals </h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard  </a></li>
                                    <li class="breadcrumb-item active">Arrivals </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" id="customerList">
                            <div class="card-header border-bottom-dashed">

                                <div class="row g-4 align-items-center">
                                    <div class="col-sm">
                                        <div>
                                            <h5 class="card-title mb-0">List of  arrivals </h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto">
                                        <div>

                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#addArrival"><i class="ri-add-line align-bottom me-1"></i> Add arrival </button>

                                           <button type="button" class="btn btn-info"><i class="ri-printer-fill align-bottom me-1"></i> Export</button>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div>

                                    @if (count($arrivals) > 0)
                                    <table id="alternative-pagination" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">

                                        <thead>
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                </div>
                                            </th>

                                            <th>Traveler </th>
                                            <th>Date </th>
                                            <th>Flight  </th>
                                            <th>Border </th>

                                            <th>Actions</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $arrivals as $arrival )

                                            <tr>
                                            <td data-id="{{$arrival->id}}">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                </div>
                                            </td>
                                            <td>
                                                {{ $arrival->traveler->firstname .' '.$arrival->traveler->lastname }}
                                            </td>
                                            <td>{{ \App\Models\Arrival::getDateArrive($arrival->id) }}</td>
                                            <td>{{ $arrival->flight }}</td>
                                            <td>{{ $arrival->border }}</td>



                                            <td>

                                                <ul class="list-inline hstack gap-2 mb-0">
                                                    <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Modifier">
                                                        <a href="" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn modifierArrival ">
                                                            <i class="ri-pencil-fill fs-16"></i>
                                                        </a>
                                                    </li>

                                                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Supprimer">
                                                        <a class="text-danger d-inline-block remove-item-btn supprimerArrival" data-bs-toggle="modal" href="">
                                                            <i class="ri-delete-bin-5-fill fs-16"></i>
                                                        </a>
                                                    </li>
                                                </ul>


                                            </td>

                                        </tr>
                                        @endforeach



                                        </tbody>
                                    </table>

                                    <div class="table-responsive table-card mb-1">




                                        @else


                                            <div class="noresult" >
                                                <div class="text-center">

                                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px"></lord-icon>

                                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                                    <p class="text-muted"> We did not find any arrivals  for you search.</p>


                                                </div>
                                            </div>


                                        @endif
                                    </div>

                                </div>
                            @include('arrival.modal')


                            </div>
                        </div>

                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

            </div>
            <!-- container-fluid -->
        </div>


@endsection



@section('js')




    <script src="{{asset('assets/jquery-3.6.0.min.js')}}" ></script>

    <!--datatable js-->
    <script src="{{asset('assets/datatables/1.11.5/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/datatables/1.11.5/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/datatables/responsive/2.2.9/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/datatables/buttons/2.2.2/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/datatables/buttons/2.2.2/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/datatables/buttons/2.2.2/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/datatables/ajax/libs/pdfmake/0.1.53/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/datatables/ajax/libs/pdfmake/0.1.53/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/datatables/ajax/libs/jszip/3.1.3/jszip.min.js')}}"></script>

    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>





    <!-- Sweet Alerts js -->
    <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>




    <script>


        jQuery(document).ready(function(){



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
            $('#time_arrival').val('');
            $('#flight').val('');
            $('#border').val('');
            $('#traveler_id').val('');
            $('#erreurDate').text('');
            $('#erreurTime').text('');
            $('#erreurFlight').text('');
            $('#erreurBorder').text('');

            $("#ajouterArrival").show();
            $("#updateArrival").hide();

        }



        //------------------------ fonction d' ajout de Arrival
        function ajouterArrival() {

            let allValid = true;
            let date_arrival =  $('#date_arrival').val();
            let time_arrival =  $('#time_arrival').val();
            let flight = $('#flight').val() ;
            let border =  $('#border').val();
            let traveler_id = parseInt($('#traveler_id').val()) ;

            if(date_arrival ==='')
            {
                $('#erreurDate').text("Required " );
                allValid = false;

            }

            if(time_arrival === '')
            {
                $('#erreurTime').text("Required " );
                allValid = false;

            }


            if(flight === '')
            {
                $('#erreurFlight').text("Required " );
                allValid = false;

            }

            if(border === '')
            {
                $('#erreurBorder').text("Required " );
                allValid = false;

            }


            if(traveler_id === 0)
            {
                $('#erreurTraveller').text("Required " );
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
                        time_arrival:time_arrival,
                        flight:flight,
                        border:border,
                        traveler_id:traveler_id,

                    } ,

                    success: function(data) {

                        console.log(data.data)


                        if(data.data.isValid)
                        {
                            $('#addArrival').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Arrival add with success ',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {


                            $('#erreurDate ').text(data.data.erreurDate );
                            $('#erreurTime').text(data.data.erreurTime);
                            $('#erreurFlight').text(data.data.erreurFlight);
                            $('#erreurBorder').text(data.data.erreurBorder);
                            $('#erreurTraveller').text(data.data.erreurTraveller);

                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }



        //------------------------ fonction d' affichage d 'une offre '
        function modifierArrival(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/arrivals/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Modifier un Arrival');

                        $('#date_arrival').val(data.date_arrival);
                        $('#time_arrival').val(data.time_arrival);
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
            let time_arrival =  $('#time_arrival').val();
            let flight = $('#flight').val() ;
            let border =  $('#border').val();
            let traveler_id = parseInt($('#traveler_id').val()) ;


            let id =    $('#idArrival').val();



            if(date_arrival ==='')
            {
                $('#erreurDate').text("Required " );
                allValid = false;

            }

            if(time_arrival === '')
            {
                $('#erreurTime').text("Required " );
                allValid = false;

            }


            if(flight === '')
            {
                $('#erreurFlight').text("Required " );
                allValid = false;

            }

            if(border === '')
            {
                $('#erreurBorder').text("Required " );
                allValid = false;

            }


            if(traveler_id === 0)
            {
                $('#erreurTraveller').text("Required " );
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
                        time_arrival:time_arrival,
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
                                    title: 'Arrival   update  with  success',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurDate ').text(data.data.erreurDate );
                            $('#erreurTime').text(data.data.erreurTime);
                            $('#erreurFlight').text(data.data.erreurFlight);
                            $('#erreurBorder').text(data.data.erreurBorder);
                            $('#erreurTraveller').text(data.data.erreurTraveller);


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
                title: "Do you want to delete this arrival ",
                icon: 'question',
                text: "",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Valid",
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






    </script>

@endsection
