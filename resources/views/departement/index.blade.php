@extends('layout.app')

@section('libelle')
    Departments - List

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

            <!-- start page libelle -->
            <div class="row">
                <div class="col-12">
                    <div class="page-libelle-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Departments </h4>

                        <div class="page-libelle-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard  </a></li>
                                <li class="breadcrumb-item active">Departments </li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page libelle -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="customerList">
                        <div class="card-header border-bottom-dashed">

                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <div>
                                        <h5 class="card-libelle mb-0">List of  departments </h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div>

                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#addDepartment"><i class="ri-add-line align-bottom me-1"></i> Add Department </button>

                                        {{--                                        <button type="button" class="btn btn-info"><i class="ri-printer-fill align-bottom me-1"></i> Export</button>--}}


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div>

                                @if (count($departements) > 0)
                                    <table id="alternative-pagination" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">

                                        <thead>
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                </div>
                                            </th>

                                              <th style="width: 70%">Title  </th>

                                            <th>Actions</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $departements as $department )

                                            <tr>
                                                <td data-id="{{$department->id}}">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                    </div>
                                                </td>
                                               <td>  {{ $department->title }}</td>



                                                <td>

                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                        <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" libelle="Modifier">
                                                            <a href="" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn modifierDepartment ">
                                                                <i class="ri-pencil-fill fs-16"></i>
                                                            </a>
                                                        </li>

                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" libelle="Supprimer">
                                                            <a class="text-danger d-inline-block remove-item-btn supprimerDepartment" data-bs-toggle="modal" href="">
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
                                                    <p class="text-muted"> We did not find any Departments  for you search.</p>


                                                </div>
                                            </div>


                                        @endif
                                    </div>

                            </div>
                            @include('departement.modal')


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
                $('#erreurTitle').text("Required " );
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
                $('#erreurTitle').text("Required " );
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
                                    title: 'Department   modify   with success ',
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
                title: "Do you want to delete  Department  ",
                icon: 'question',
                text: "",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Delete",
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
