@extends('layout.app')

@section('titre')
    Coutumes - List

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
                    <h4 class="page-title">Coutumes </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addCoutume"><i class="fa fa-plus"></i> Add Coutume</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th>Continent  </th>
                                <th>Region  </th>
                                <th>Countrie  </th>
                                <th>Prefecture  </th>
                                <th>Libelle  </th>


                                <th>Employees  </th>


                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $coutumes as $coutume )
                                <tr>
                                    <td data-id="{{$coutume->id}}">{{ $i++ }}</td>
                                    <td>  {{ $coutume->continent->libelle }}</td>
                                    <td>  {{ $coutume->region->libelle }}</td>
                                    <td>  {{ $coutume->countrie->libelle }}</td>
                                    <td>  {{ $coutume->prefecture->libelle }}</td>
                                    <td>  {{ $coutume->libelle }}</td>


                                    <td>

                                        @php

                                            $total= App\Models\Employe::totalEmployeeByCoutume($coutume->id);

                                        @endphp
                                        {{$total}}



                                    </td>





                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierCoutume" href="#"><i class="fa fa-pencil m-r-5"></i> Modifier </a>



                                                <a class="dropdown-item supprimerCoutume" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Suprimer </a>



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


        @include('Coutume.modal')

    </div>


@endsection



@section('js')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



    <script>


        jQuery(document).ready(function(){



            $( "#annulerCoutume" ).click(function( event ) {
                event.preventDefault();


                fermerCoutume()
            });


            $( "#updateCoutume" ).click(function( event ) {
                event.preventDefault();


                updateCoutume()
            });


            $( "#ajouterCoutume" ).click(function( event ) {
                event.preventDefault();


                ajouterCoutume()
            });


            $( ".modifierCoutume" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierCoutume(id)
            });


            $( ".supprimerCoutume" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                deleteConfirmation(id)
            });

            clearData()

        });

        function clearData() {

            $('#libelle').val('');


            $('#erreurLibelle').text('');



            $("#ajouterCoutume").show();
            $("#updateCoutume").hide();

        }



        //------------------------ fonction d' ajout de Coutume
        function ajouterCoutume() {

            let allValid = true;
            let libelle =  $('#libelle').val();

            let prefecture_id = parseInt($('#prefecture_id').val()) ;



            if(libelle ==='')
            {
                $('#erreurLibelle').text("Le libelle  est obligatoire " );
                allValid = false;

            }

            if(prefecture_id === 0)
            {
                $('#erreurPrefecture').text("Le choix de la prefecture      est obligatoire " );
                allValid = false;

            }




            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('coutume_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        libelle:libelle,
                        prefecture_id:prefecture_id,

                    } ,

                    success: function(data) {


                        if(data.data.isValid)
                        {
                            $('#addCoutume').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Coutume  add with succes ',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {


                            $('#erreurLibelle').text(data.data.erreurLibelle);

                            $('#erreurPrefecture').text(data.data.erreurPrefecture);


                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }

        //------------------------ fonction de modification du Coutume
        function modifierCoutume(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/coutumes/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Modify Coutume');

                        $('#libelle').val(data.libelle);

                        $('#prefecture_id').val(data.prefecture_id);


                        $('#idCoutume').val(data.id);

                        $("#ajouterCoutume").hide();
                        $("#updateCoutume").show();

                        $('#addCoutume').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updateCoutume() {

            let allValid = true;
            let libelle =  $('#libelle').val();
            let prefecture_id = parseInt($('#prefecture_id').val()) ;

            let id =    $('#idCoutume').val();



            if(libelle ==='')
            {
                $('#erreurLibelle').text("Le libelle  est obligatoire " );
                allValid = false;

            }

            if(prefecture_id === 0)
            {
                $('#erreurPrefecture').text("Le choix du continent   est obligatoire " );
                allValid = false;

            }



            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/coutumes/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        libelle:libelle,
                        prefecture_id:prefecture_id,



                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addCoutume').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Coutume   modifiée  avec succès',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurLibelle').text(data.data.erreurLibelle);
                            $('#erreurPrefecture').text(data.data.erreurPrefecture);


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
                title: "Voulez-vous vraiment supprimer cette  région   ",
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
                        url: "{{url('/coutumes/delete')}}/" + id,
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

        function fermerCoutume() {

            clearData();

            $('#myModalLabel').text('Add  Coutume');
            $('#addCoutume').modal('toggle');


        }


    </script>
@endsection
