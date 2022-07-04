@extends('layout.app')

@section('titre')
    Regions - List

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
                    <h4 class="page-title">Regions </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addRegion"><i class="fa fa-plus"></i> Add Region</a>
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
                                <th>Libelle  </th>


                                <th>Employees  </th>


                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $regions as $region )
                                <tr>
                                    <td data-id="{{$region->id}}">{{ $i++ }}</td>
                                    <td>  {{ $region->continent->libelle }}</td>
                                    <td>  {{ $region->libelle }}</td>




                                    <td>

                                        @php

                                            $total= App\Models\Employe::totalEmployeeByRegion($region->id);

                                        @endphp
                                        {{$total}}



                                    </td>





                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierRegion" href="#"><i class="fa fa-pencil m-r-5"></i> Modifier </a>



                                                <a class="dropdown-item supprimerRegion" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Suprimer </a>



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


        @include('Region.modal')

    </div>


@endsection



@section('js')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



    <script>


        jQuery(document).ready(function(){



            $( "#annulerRegion" ).click(function( event ) {
                event.preventDefault();


                fermerRegion()
            });


            $( "#updateRegion" ).click(function( event ) {
                event.preventDefault();


                updateRegion()
            });


            $( "#ajouterRegion" ).click(function( event ) {
                event.preventDefault();


                ajouterRegion()
            });


            $( ".modifierRegion" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierRegion(id)
            });


            $( ".supprimerRegion" ).click(function( event ) {
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



            $("#ajouterRegion").show();
            $("#updateRegion").hide();

        }



        //------------------------ fonction d' ajout de Region
        function ajouterRegion() {

            let allValid = true;
            let libelle =  $('#libelle').val();
            let continent_id = parseInt($('#continent_id').val()) ;



            if(libelle ==='')
            {
                $('#erreurLibelle').text("Le libelle  est obligatoire " );
                allValid = false;

            }

            if(continent_id === 0)
            {
                $('#erreurContinent').text("Le choix du continent   est obligatoire " );
                allValid = false;

            }




            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('region_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        libelle:libelle,
                        continent_id:continent_id,

                    } ,

                    success: function(data) {


                        if(data.data.isValid)
                        {
                            $('#addRegion').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Region  add with succes ',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {


                            $('#erreurLibelle').text(data.data.erreurLibelle);
                            $('#erreurContinent').text(data.data.erreurContinent);


                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }

        //------------------------ fonction de modification du Region
        function modifierRegion(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/regions/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Modify Region');

                        $('#libelle').val(data.libelle);
                        $('#continent_id').val(data.continent_id);




                        $('#idRegion').val(data.id);

                        $("#ajouterRegion").hide();
                        $("#updateRegion").show();

                        $('#addRegion').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updateRegion() {

            let allValid = true;
            let libelle =  $('#libelle').val();
            let continent_id = parseInt($('#continent_id').val()) ;

            let id =    $('#idRegion').val();



            if(libelle ==='')
            {
                $('#erreurLibelle').text("Le libelle  est obligatoire " );
                allValid = false;

            }

            if(continent_id === 0)
            {
                $('#erreurContinent').text("Le choix du continent   est obligatoire " );
                allValid = false;

            }



            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/regions/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        libelle:libelle,
                        continent_id:continent_id,



                    } ,


                    success: function(data) {

console.log(data.data)

                        if(data.data.isValid)
                        {

                            console.log(data.data)
                            $('#addRegion').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Region   modifiée  avec succès',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurLibelle').text(data.data.erreurLibelle);


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
                        url: "{{url('/regions/delete')}}/" + id,
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

        function fermerRegion() {

            clearData();

            $('#myModalLabel').text('Add  Region');
            $('#addRegion').modal('toggle');


        }


    </script>
@endsection
