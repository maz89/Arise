@extends('layout.app')

@section('titre')
    Businesses - List

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
                    <h4 class="page-title">Businesses </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addBusinesse"><i class="fa fa-plus"></i> Add Businesse</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th>Code   </th>
                                <th>Title    </th>


{{--                                <th>Employees  </th>--}}


                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $businesses as $businesse )
                                <tr>
                                    <td data-id="{{$businesse->id}}">{{ $i++ }}</td>
                                    <td>  {{ $businesse->code  }}</td>
                                    <td>  {{ $businesse->title  }}</td>




                                   {{-- <td>

                                        @php

                                            $total= App\Models\Employe::totalEmployeeByBusinesse($businesse->id);

                                        @endphp
                                        {{$total}}



                                    </td>--}}





                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierBusinesse" href="#"><i class="fa fa-pencil m-r-5"></i> Modifier </a>



                                                <a class="dropdown-item supprimerBusinesse" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Suprimer </a>



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


        @include('business.modal')

    </div>


@endsection



@section('js')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



    <script>


        jQuery(document).ready(function(){



            $( "#annulerBusinesse" ).click(function( event ) {
                event.preventDefault();


                fermerBusinesse()
            });


            $( "#updateBusinesse" ).click(function( event ) {
                event.preventDefault();


                updateBusinesse()
            });


            $( "#ajouterBusinesse" ).click(function( event ) {
                event.preventDefault();


                ajouterBusinesse()
            });


            $( ".modifierBusinesse" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierBusinesse(id)
            });


            $( ".supprimerBusinesse" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                deleteConfirmation(id)
            });

            clearData()

        });

        function clearData() {

            $('#libelle').val('');


            $('#erreurCode').text('');



            $("#ajouterBusinesse").show();
            $("#updateBusinesse").hide();

        }



        //------------------------ fonction d' ajout de Businesse
        function ajouterBusinesse() {

            let allValid = true;
            let code =  $('#code').val();
            let title =  $('#title').val();



            if(code ==='')
            {
                $('#erreurCode').text("Le code   est obligatoire " );
                allValid = false;

            }

            if(title ==='')
            {
                $('#erreurTitle').text("Le title   est obligatoire " );
                allValid = false;

            }




            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('business_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        code:code,
                        title:title,

                    } ,

                    success: function(data) {


                        if(data.data.isValid)
                        {
                            $('#addBusinesse').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Businesse  add with succes ',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {


                            $('#erreurCode').text(data.data.erreurCode);


                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }

        //------------------------ fonction de modification du Businesse
        function modifierBusinesse(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/businesses/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Modify Businesse');

                        $('#code').val(data.code);
                        $('#title').val(data.title);




                        $('#idBusinesse').val(data.id);

                        $("#ajouterBusinesse").hide();
                        $("#updateBusinesse").show();

                        $('#addBusinesse').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updateBusinesse() {

            let allValid = true;

            let code =  $('#code').val();
            let title =  $('#title').val();

            let id =    $('#idBusinesse').val();



            if(code ==='')
            {
                $('#erreurCode').text("Le code   est obligatoire " );
                allValid = false;

            }

            if(title ==='')
            {
                $('#erreurTitle').text("Le title   est obligatoire " );
                allValid = false;

            }





            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/businesses/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        code:code,
                        title:title,



                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addBusinesse').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Businesse   modifié  avec succès',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurCode').text(data.data.erreurCode);


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
                title: "Voulez-vous vraiment supprimer ce Businesse  ",
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
                        url: "{{url('/businesses/delete')}}/" + id,
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

        function fermerBusinesse() {

            clearData();

            $('#myModalLabel').text('Add a Businesse');
            $('#addBusinesse').modal('toggle');


        }


    </script>
@endsection
