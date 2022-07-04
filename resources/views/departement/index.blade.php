@extends('layout.app')

@section('titre')
    Departments - List

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
                    <h4 class="page-title">Departments </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addDepartment"><i class="fa fa-plus"></i> Add Department</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th>Title  </th>





                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $departements as $departement )
                                <tr>
                                    <td data-id="{{$departement->id}}">{{ $i++ }}</td>
                                    <td>  {{ $departement->title }}</td>










                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierDepartment" href="#"><i class="fa fa-pencil m-r-5"></i> Modifier </a>



                                                <a class="dropdown-item supprimerDepartment" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Suprimer </a>



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


        @include('departement.modal')

    </div>


@endsection



@section('js')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



    <script>


        jQuery(document).ready(function(){



            $( "#annulerDepartment" ).click(function( event ) {
                event.preventDefault();


                fermerDepartment()
            });


            $( "#updateDepartment" ).click(function( event ) {
                event.preventDefault();


                updateDepartment()
            });


            $( "#ajouterDepartment" ).click(function( event ) {
                event.preventDefault();


                ajouterDepartment()
            });


            $( ".modifierDepartment" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierDepartment(id)
            });


            $( ".supprimerDepartment" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                deleteConfirmation(id)
            });

            clearData()

        });

        function clearData() {

            $('#title').val('');


            $('#erreurTitle').text('');



            $("#ajouterDepartment").show();
            $("#updateDepartment").hide();

        }



        //------------------------ fonction d' ajout de Department
        function ajouterDepartment() {

            let allValid = true;
            let title =  $('#title').val();



            if(title ==='')
            {
                $('#erreurTitle').text("Le title  est obligatoire " );
                allValid = false;

            }




            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('departement_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        title:title,

                    } ,

                    success: function(data) {


                        if(data.data.isValid)
                        {
                            $('#addDepartment').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Department  add with succes ',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {


                            $('#erreurTitle').text(data.data.erreurTitle);


                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }

        //------------------------ fonction de modification du Department
        function modifierDepartment(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/departements/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Modify Department');

                        $('#title').val(data.title);




                        $('#idDepartment').val(data.id);

                        $("#ajouterDepartment").hide();
                        $("#updateDepartment").show();

                        $('#addDepartment').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updateDepartment() {

            let allValid = true;
            let title =  $('#title').val();

            let id =    $('#idDepartment').val();



            if(title ==='')
            {
                $('#erreurTitle').text("Le title  est obligatoire " );
                allValid = false;

            }





            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/departements/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        title:title,



                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addDepartment').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Department   modifié  avec succès',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurTitle').text(data.data.erreurTitle);


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
                title: "Voulez-vous vraiment supprimer ce Department  ",
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
                        url: "{{url('/departements/delete')}}/" + id,
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

        function fermerDepartment() {

            clearData();

            $('#myModalLabel').text('Add un Department');
            $('#addDepartment').modal('toggle');


        }


    </script>
@endsection
