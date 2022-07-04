@extends('layout.app')

@section('titre')
    Prefectures - List

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
                    <h4 class="page-title">Prefectures </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addPrefecture"><i class="fa fa-plus"></i> Add Prefecture</a>
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
                                <th>Libelle  </th>


                                <th>Employees  </th>


                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $prefectures as $prefecture )
                                <tr>
                                    <td data-id="{{$prefecture->id}}">{{ $i++ }}</td>
                                    <td>  {{ $prefecture->continent->libelle }}</td>
                                    <td>  {{ $prefecture->region->libelle }}</td>
                                    <td>  {{ $prefecture->countrie->libelle }}</td>
                                    <td>  {{ $prefecture->libelle }}</td>


                                    <td>

                                        @php

                                            $total= App\Models\Employe::totalEmployeeByPrefecture($prefecture->id);

                                        @endphp
                                        {{$total}}



                                    </td>





                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierPrefecture" href="#"><i class="fa fa-pencil m-r-5"></i> Modifier </a>



                                                <a class="dropdown-item supprimerPrefecture" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Suprimer </a>



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


        @include('Prefecture.modal')

    </div>


@endsection



@section('js')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



    <script>


        jQuery(document).ready(function(){



            $( "#annulerPrefecture" ).click(function( event ) {
                event.preventDefault();


                fermerPrefecture()
            });


            $( "#updatePrefecture" ).click(function( event ) {
                event.preventDefault();


                updatePrefecture()
            });


            $( "#ajouterPrefecture" ).click(function( event ) {
                event.preventDefault();


                ajouterPrefecture()
            });


            $( ".modifierPrefecture" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierPrefecture(id)
            });


            $( ".supprimerPrefecture" ).click(function( event ) {
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



            $("#ajouterPrefecture").show();
            $("#updatePrefecture").hide();

        }



        //------------------------ fonction d' ajout de Prefecture
        function ajouterPrefecture() {

            let allValid = true;
            let libelle =  $('#libelle').val();

            let countrie_id = parseInt($('#countrie_id').val()) ;



            if(libelle ==='')
            {
                $('#erreurLibelle').text("Le libelle  est obligatoire " );
                allValid = false;

            }

            if(countrie_id === 0)
            {
                $('#erreurCountrie').text("Le choix du countrie     est obligatoire " );
                allValid = false;

            }




            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('prefecture_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        libelle:libelle,
                        countrie_id:countrie_id,

                    } ,

                    success: function(data) {


                        if(data.data.isValid)
                        {
                            $('#addPrefecture').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Prefecture  add with succes ',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {


                            $('#erreurLibelle').text(data.data.erreurLibelle);

                            $('#erreurCountrie').text(data.data.erreurCountrie);


                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }

        //------------------------ fonction de modification du Prefecture
        function modifierPrefecture(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/prefectures/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Modify Prefecture');

                        $('#libelle').val(data.libelle);

                        $('#countrie_id').val(data.countrie_id);


                        $('#idPrefecture').val(data.id);

                        $("#ajouterPrefecture").hide();
                        $("#updatePrefecture").show();

                        $('#addPrefecture').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updatePrefecture() {

            let allValid = true;
            let libelle =  $('#libelle').val();
            let countrie_id = parseInt($('#countrie_id').val()) ;

            let id =    $('#idPrefecture').val();



            if(libelle ==='')
            {
                $('#erreurLibelle').text("Le libelle  est obligatoire " );
                allValid = false;

            }

            if(countrie_id === 0)
            {
                $('#erreurCountrie').text("Le choix du continent   est obligatoire " );
                allValid = false;

            }



            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/prefectures/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        libelle:libelle,
                        countrie_id:countrie_id,



                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addPrefecture').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Prefecture   modifiée  avec succès',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurLibelle').text(data.data.erreurLibelle);
                            $('#erreurCountrie').text(data.data.erreurCountrie);


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
                        url: "{{url('/prefectures/delete')}}/" + id,
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

        function fermerPrefecture() {

            clearData();

            $('#myModalLabel').text('Add  Prefecture');
            $('#addPrefecture').modal('toggle');


        }


    </script>
@endsection
