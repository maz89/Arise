@extends('layout.app')

@section('titre')
    Countries - List

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
                    <h4 class="page-title">Countries </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addCountrie"><i class="fa fa-plus"></i> Add Countrie</a>
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
                                <th>Libelle  </th>


                                <th>Employees  </th>


                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $countries as $countrie )
                                <tr>
                                    <td data-id="{{$countrie->id}}">{{ $i++ }}</td>
                                    <td>  {{ $countrie->continent->libelle }}</td>
                                    <td>  {{ $countrie->region->libelle }}</td>
                                    <td>  {{ $countrie->libelle }}</td>


                                    <td>

                                        @php

                                            $total= App\Models\Employe::totalEmployeeByCountrie($countrie->id);

                                        @endphp
                                        {{$total}}



                                    </td>





                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierCountrie" href="#"><i class="fa fa-pencil m-r-5"></i> Modifier </a>



                                                <a class="dropdown-item supprimerCountrie" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Suprimer </a>



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


        @include('countrie.modal')

    </div>


@endsection



@section('js')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



    <script>


        jQuery(document).ready(function(){



            $( "#annulerCountrie" ).click(function( event ) {
                event.preventDefault();


                fermerCountrie()
            });


            $( "#updateCountrie" ).click(function( event ) {
                event.preventDefault();


                updateCountrie()
            });


            $( "#ajouterCountrie" ).click(function( event ) {
                event.preventDefault();


                ajouterCountrie()
            });


            $( ".modifierCountrie" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierCountrie(id)
            });


            $( ".supprimerCountrie" ).click(function( event ) {
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



            $("#ajouterCountrie").show();
            $("#updateCountrie").hide();

        }



        //------------------------ fonction d' ajout de Countrie
        function ajouterCountrie() {

            let allValid = true;
            let libelle =  $('#libelle').val();
            let nationality =  $('#nationality').val();
            let region_id = parseInt($('#region_id').val()) ;



            if(libelle ==='')
            {
                $('#erreurLibelle').text("Le libelle  est obligatoire " );
                allValid = false;

            }

            if(region_id === 0)
            {
                $('#erreurRegion').text("Le choix de la region    est obligatoire " );
                allValid = false;

            }




            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('countrie_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        libelle:libelle,
                        nationality:nationality,
                        region_id:region_id,

                    } ,

                    success: function(data) {


                        if(data.data.isValid)
                        {
                            $('#addCountrie').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Countrie  add with succes ',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {


                            $('#erreurLibelle').text(data.data.erreurLibelle);

                            $('#erreurRegion').text(data.data.erreurRegion);


                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }

        //------------------------ fonction de modification du Countrie
        function modifierCountrie(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/countries/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Modify Countrie');

                        $('#libelle').val(data.libelle);
                        $('#nationality').val(data.nationality);
                        $('#region_id').val(data.region_id);


                        $('#idCountrie').val(data.id);

                        $("#ajouterCountrie").hide();
                        $("#updateCountrie").show();

                        $('#addCountrie').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updateCountrie() {

            let allValid = true;
            let libelle =  $('#libelle').val();
            let nationality =  $('#nationality').val();
            let region_id = parseInt($('#region_id').val()) ;

            let id =    $('#idCountrie').val();



            if(libelle ==='')
            {
                $('#erreurLibelle').text("Le libelle  est obligatoire " );
                allValid = false;

            }

            if(region_id === 0)
            {
                $('#erreurRegion').text("Le choix du continent   est obligatoire " );
                allValid = false;

            }



            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/countries/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        libelle:libelle,
                        nationality:nationality,
                        region_id:region_id,



                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addCountrie').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Countrie   modifiée  avec succès',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurLibelle').text(data.data.erreurLibelle);
                            $('#erreurRegion').text(data.data.erreurRegion);


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
                        url: "{{url('/countries/delete')}}/" + id,
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

        function fermerCountrie() {

            clearData();

            $('#myModalLabel').text('Add  countrie');
            $('#addCountrie').modal('toggle');


        }


    </script>
@endsection
