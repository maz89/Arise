@extends('layout.app')

@section('titre')
    Positions - List

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
                    <h4 class="page-title">Positions </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addPosition"><i class="fa fa-plus"></i> Add Position</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th>Job title   </th>
                                <th>Job french    </th>


                                <th>Employees  </th>


                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $positions as $position )
                                <tr>
                                    <td data-id="{{$position->id}}">{{ $i++ }}</td>
                                    <td>  {{ $position->job_title }}</td>
                                    <td>  {{ $position->job_french }}</td>




                                    <td>

                                        @php

                                            $total= App\Models\Employe::totalEmployeeByPosition($position->id);

                                        @endphp
                                        {{$total}}



                                    </td>





                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierPosition" href="#"><i class="fa fa-pencil m-r-5"></i> Modifier </a>



                                                <a class="dropdown-item supprimerPosition" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Suprimer </a>



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


        @include('position.modal')

    </div>


@endsection



@section('js')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



    <script>


        jQuery(document).ready(function(){



            $( "#annulerPosition" ).click(function( event ) {
                event.preventDefault();


                fermerPosition()
            });


            $( "#updatePosition" ).click(function( event ) {
                event.preventDefault();


                updatePosition()
            });


            $( "#ajouterPosition" ).click(function( event ) {
                event.preventDefault();


                ajouterPosition()
            });


            $( ".modifierPosition" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierPosition(id)
            });


            $( ".supprimerPosition" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                deleteConfirmation(id)
            });

            clearData()

        });

        function clearData() {

            $('#job_title').val('');
            $('#job_french').val('');


            $('#erreurJobTitle').text('');



            $("#ajouterPosition").show();
            $("#updatePosition").hide();

        }



        //------------------------ fonction d' ajout de Position
        function ajouterPosition() {

            let allValid = true;
            let job_title =  $('#job_title').val();
            let job_french =  $('#job_french').val();



            if(job_title ==='')
            {
                $('#erreurJobTitle').text("Le title   est obligatoire " );
                allValid = false;

            }




            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('position_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        job_title:job_title,
                        job_french:job_french,

                    } ,

                    success: function(data) {


                        if(data.data.isValid)
                        {
                            $('#addPosition').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Position  add with succes ',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {


                            $('#erreurJobTitle').text(data.data.erreurJobTitle);


                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }

        //------------------------ fonction de modification du Position
        function modifierPosition(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/positions/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Modify Position');

                        $('#job_title').val(data.job_title);
                        $('#job_french').val(data.job_french);




                        $('#idPosition').val(data.id);

                        $("#ajouterPosition").hide();
                        $("#updatePosition").show();

                        $('#addPosition').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updatePosition() {

            let allValid = true;
            let job_title =  $('#job_title').val();
            let job_french =  $('#job_french').val();

            let id =    $('#idPosition').val();



            if(job_title ==='')
            {
                $('#erreurJobTitle').text("Le title   est obligatoire " );
                allValid = false;

            }




            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/positions/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        job_title:job_title,
                        job_french:job_french,



                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addPosition').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Position   modifié  avec succès',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurJobTitle').text(data.data.erreurJobTitle);


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
                title: "Voulez-vous vraiment supprimer cette position   ",
                icon: 'question',
                text: "",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Valider",
                cancelButtonText: "Annuler",
                reverseButtons: !0
            }).then(function (e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{url('/positions/delete')}}/" + id,
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

        function fermerPosition() {

            clearData();

            $('#myModalLabel').text('Add un Position');
            $('#addPosition').modal('toggle');


        }


    </script>
@endsection
