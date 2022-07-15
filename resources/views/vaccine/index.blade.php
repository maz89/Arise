@extends('layout.app')

@section('libelle')
    Vaccines - List

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
                        <h4 class="mb-sm-0">Vaccines </h4>

                        <div class="page-libelle-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard  </a></li>
                                <li class="breadcrumb-item active">Vaccines </li>
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
                                        <h5 class="card-libelle mb-0">List of  Vaccines </h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div>

                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#addVaccine"><i class="ri-add-line align-bottom me-1"></i> Add Vaccine </button>

                                       <button type="button" class="btn btn-info"><i class="ri-printer-fill align-bottom me-1"></i> Export</button>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div>

                                @if (count($vaccines) > 0)
                                    <table id="alternative-pagination" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">

                                        <thead>
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                </div>
                                            </th>

                                            <th>Disease   </th>
                                <th>Name   </th>


                                <th>Nb doses   </th>

                                            <th>Actions</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $vaccines as $vaccine )

                                            <tr>
                                                <td data-id="{{$vaccine->id}}">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                    </div>
                                                </td>



                                <td>  {{ $vaccine->disease->libelle }}</td>
                                    <td>  {{ $vaccine->name }}</td>
                                    <td>


                                        <span class="badge badge-pill bg-danger" data-key="t-new">   {{ $vaccine->nb_doses }}</span>


                                    </td>



                                  <td>

                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                        <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" libelle="Modifier">
                                                            <a href="" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn modifierVaccine ">
                                                                <i class="ri-pencil-fill fs-16"></i>
                                                            </a>
                                                        </li>

                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" libelle="Supprimer">
                                                            <a class="text-danger d-inline-block remove-item-btn supprimerVaccine" data-bs-toggle="modal" href="">
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
                                                    <p class="text-muted"> We did not find any Vaccines  for you search.</p>


                                                </div>
                                            </div>


                                        @endif
                                    </div>

                            </div>
                            @include('Vaccine.modal')


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



            $( "#annulerVaccine" ).click(function( event ) {
                event.preventDefault();


                fermerVaccine()
            });


            $( "#updateVaccine" ).click(function( event ) {
                event.preventDefault();


                updateVaccine()
            });


            $( "#ajouterVaccine" ).click(function( event ) {
                event.preventDefault();


                ajouterVaccine()
            });


            $( ".modifierVaccine" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierVaccine(id)
            });


            $( ".supprimerVaccine" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                deleteConfirmation(id)
            });

            clearData()

        });

        function clearData() {

            $('#name').val('');
            $('#nb_doses').val('');
            $('#disease_id').val('');


            $('#erreurName').text('');
            $('#erreurnb_doses').text('');
            $('#erreurdisease_id').text('');



            $("#ajouterVaccine").show();
            $("#updateVaccine").hide();

        }



        //------------------------ fonction d' ajout de Vaccine
        function ajouterVaccine() {


            let allValid = true;
            let name =  $('#name').val();
            let nb_doses = parseInt($('#nb_doses').val()) ;
            let disease_id = parseInt($('#disease_id').val()) ;



            if(name ==='')
            {
                $('#erreurName').text("Required " );
                allValid = false;

            }

            if(nb_doses === 0)
            {
                $('#erreurnb_doses').text("Le Required " );
                allValid = false;

            }


            if(disease_id === 0)
            {
                $('#erreurdisease_id').text("Required " );
                allValid = false;

            }




            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('vaccine_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        name:name,
                        nb_doses:nb_doses,
                        disease_id:disease_id,

                    } ,

                    success: function(data) {


                        if(data.data.isValid)
                        {
                            $('#addVaccine').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Vaccine  add with succes ',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {


                            $('#erreurName').text(data.data.erreurName);
                            $('#erreurnb_doses').text(data.data.erreurnb_doses);
                            $('#erreurdisease_id').text(data.data.erreurdisease_id);


                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }

        //------------------------ fonction de modification du Vaccine
        function modifierVaccine(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/vaccines/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Modify vaccine');

                        $('#name').val(data.name);
                        $('#nb_doses').val(data.nb_doses);
                        $('#disease_id').val(data.disease_id);




                        $('#idVaccine').val(data.id);

                        $("#ajouterVaccine").hide();
                        $("#updateVaccine").show();

                        $('#addVaccine').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updateVaccine() {

            let allValid = true;
            let name =  $('#name').val();
            let nb_doses = parseInt($('#nb_doses').val()) ;
            let disease_id = parseInt($('#disease_id').val()) ;


            let id =    $('#idVaccine').val();




            if(name ==='')
            {
                $('#erreurName').text("Required  " );
                allValid = false;

            }

            if(nb_doses === 0)
            {
                $('#erreurnb_doses').text("Required " );
                allValid = false;

            }


            if(disease_id === 0)
            {
                $('#erreurdisease_id').text("Required  " );
                allValid = false;

            }



            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/vaccines/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        name:name,
                        nb_doses:nb_doses,
                        disease_id:disease_id,

                    } ,


                    success: function(data) {

console.log(data.data)

                        if(data.data.isValid)
                        {

                            console.log(data.data)
                            $('#addVaccine').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Vaccine   modify   with  success',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurName').text(data.data.erreurName);
                            $('#erreurnb_doses').text(data.data.erreurnb_doses);
                            $('#erreurdisease_id').text(data.data.erreurdisease_id);


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
                title: "Do you want to delete this vaccine .  ",
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
                        url: "{{url('/vaccines/delete')}}/" + id,
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

        function fermerVaccine() {

            clearData();

            $('#myModalLabel').text('Add  Vaccine');
            $('#addVaccine').modal('toggle');


        }


    </script>


@endsection
