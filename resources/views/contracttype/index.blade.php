@extends('layout.app')

@section('titre')
    Contract Types - List

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
                    <h4 class="page-title">Contract Types </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addContractType"><i class="fa fa-plus"></i> Add ContractType</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th>Libelle  </th>


                                <th>Employees  </th>


                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $contracttypes as $contracttype )
                                <tr>
                                    <td data-id="{{$contracttype->id}}">{{ $i++ }}</td>
                                    <td>  {{ $contracttype->name }}</td>




                                    <td>

                                        @php

                                            $total= App\Models\Employe::totalEmployeeByContractType($contracttype->id);

                                        @endphp
                                        {{$total}}



                                    </td>





                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierContractType" href="#"><i class="fa fa-pencil m-r-5"></i> Modifier </a>


                                                <a class="dropdown-item supprimerContractType" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Suprimer </a>



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


        @include('contracttype.modal')

    </div>


@endsection



@section('js')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



    <script>


        jQuery(document).ready(function(){



            $( "#annulerContractType" ).click(function( event ) {
                event.preventDefault();


                fermerContractType()
            });


            $( "#updateContractType" ).click(function( event ) {
                event.preventDefault();


                updateContractType()
            });


            $( "#ajouterContractType" ).click(function( event ) {
                event.preventDefault();


                ajouterContractType()
            });


            $( ".modifierContractType" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierContractType(id)
            });


            $( ".supprimerContractType" ).click(function( event ) {
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



            $("#ajouterContractType").show();
            $("#updateContractType").hide();

        }



        //------------------------ fonction d' ajout de ContractType
        function ajouterContractType() {

            let allValid = true;
            let libelle =  $('#libelle').val();



            if(libelle ==='')
            {
                $('#erreurLibelle').text("Le libelle  est obligatoire " );
                allValid = false;

            }




            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('contract_type_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        libelle:libelle,

                    } ,

                    success: function(data) {


                        if(data.data.isValid)
                        {
                            $('#addContractType').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Contract type  add with succes ',
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

        //------------------------ fonction de modification du ContractType
        function modifierContractType(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/contracttypes/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Modify Contract Type');

                        $('#libelle').val(data.libelle);




                        $('#idContractType').val(data.id);

                        $("#ajouterContractType").hide();
                        $("#updateContractType").show();

                        $('#addContractType').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updateContractType() {

            let allValid = true;
            let libelle =  $('#libelle').val();

            let id =    $('#idContractType').val();



            if(libelle ==='')
            {
                $('#erreurLibelle').text("Le libelle  est obligatoire " );
                allValid = false;

            }





            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/ContractTypes/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        libelle:libelle,



                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addContractType').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'ContractType   modifié  avec succès',
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
                title: "Voulez-vous vraiment supprimer ce Contract Type  ",
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
                        url: "{{url('/contracttypes/delete')}}/" + id,
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

        function fermerContractType() {

            clearData();

            $('#myModalLabel').text('Add un Contract Type');
            $('#addContractType').modal('toggle');


        }


    </script>
@endsection
