@extends('layout.app')

@section('libelle')
    Immunizations - List

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
                        <h4 class="mb-sm-0">Immunizations </h4>

                        <div class="page-libelle-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard  </a></li>
                                <li class="breadcrumb-item active">Immunizations </li>
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
                                        <h5 class="card-libelle mb-0">List of  immunizations </h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div>

                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#addImmunization"><i class="ri-add-line align-bottom me-1"></i> Add Immunization </button>

                                       <button type="button" class="btn btn-info"><i class="ri-printer-fill align-bottom me-1"></i> Export</button>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div>

                                @if (count($immunizations) > 0)
                                    <table id="alternative-pagination" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">

                                        <thead>
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                </div>
                                            </th>

                                             <th>Matricule     </th>
                                <th>Name    </th>
                                <th>Vaccine    </th>
                                <th>Disease    </th>
                                <th>Date    </th>
                                <th>is Vaccine   </th>


                                            <th>Actions</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $immunizations as $immunization )

                                            <tr>
                                                <td data-id="{{$immunization->id}}">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                    </div>
                                                </td>
                                                 <td>  {{ $immunization->employe->matricule }}</td>
                                    <td>  {{ $immunization->employe->first_name.' '.$immunization->employe->last_name }}</td>
                                    <td>  {{ $immunization->vaccine->name }}</td>
                                    <td>  {{ $immunization->vaccine->disease->libelle }}</td>

                                    <td>


                                        {{ \Carbon\Carbon::parse($immunization->date_immunization)->translatedFormat('d F Y') }}


                                    </td>

                                    <td>

                                        @if($immunization->is_vaccine == 1)

                                            <span class="custom-badge status-green">Yes    </span>


                                        @else

                                            <span class="custom-badge status-red">No  </span>

                                        @endif

                                    </td>





                                  <td>

                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                        <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" libelle="Modifier">
                                                            <a href="" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn modifierImmunization ">
                                                                <i class="ri-pencil-fill fs-16"></i>
                                                            </a>
                                                        </li>

                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" libelle="Supprimer">
                                                            <a class="text-danger d-inline-block remove-item-btn supprimerImmunization" data-bs-toggle="modal" href="">
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
                                                    <p class="text-muted"> We did not find any Immunizations  for you search.</p>


                                                </div>
                                            </div>


                                        @endif
                                    </div>

                            </div>
                            @include('Immunization.modal')


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



            $( "#annulerImmunization" ).click(function( event ) {
                event.preventDefault();


                fermerImmunization()
            });


            $( "#updateImmunization" ).click(function( event ) {
                event.preventDefault();


                updateImmunization()
            });


            $( "#ajouterImmunization" ).click(function( event ) {
                event.preventDefault();


                ajouterImmunization()
            });


            $( ".modifierImmunization" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierImmunization(id)
            });


            $( ".supprimerImmunization" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                deleteConfirmation(id)
            });

            clearData()

        });

        function clearData() {

            $('#employee_id').val('');
            $('#vaccine_id').val('');
            $('#date_immunization').val('');
            $('#is_vaccine').val('');
            $('#reason').val('');


            $('#erreurEmployee_id').text('');
            $('#erreurvaccine_id').text('');
            $('#erreurDate').text('');


            $("#ajouterImmunization").show();
            $("#updateImmunization").hide();

        }



        //------------------------ fonction d' ajout de Immunization
        function ajouterImmunization() {

            let allValid = true;
            let date_immunization =  $('#date_immunization').val();
            let reason =  $('#reason').val();

            let employee_id = parseInt($('#employee_id').val()) ;
            let vaccine_id = parseInt($('#vaccine_id').val()) ;
            let is_vaccine = parseInt($('#is_vaccine').val()) ;


            if(date_immunization ==='')
            {
                $('#erreurDate').text("Required  " );
                allValid = false;

            }


            if(employee_id === 0)
            {
                $('#erreurEmployee_id').text("Required" );
                allValid = false;

            }


            if(vaccine_id === 0)
            {
                $('#erreurvaccine_id').text("Required" );
                allValid = false;

            }


            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('immunization_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        employee_id:employee_id,
                        vaccine_id:vaccine_id,
                        is_vaccine:is_vaccine,
                        reason:reason,
                        date_immunization:date_immunization,

                    } ,

                    success: function(data) {


                        if(data.data.isValid)
                        {
                            $('#addImmunization').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Immunization  add with succes ',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {


                            $('#erreurEmployee_id').text(data.data.erreurEmployee_id);

                            $('#erreurvaccine_id').text(data.data.erreurvaccine_id);
                            $('#erreurDate').text(data.data.erreurDate);


                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }

        //------------------------ fonction de modification du Immunization
        function modifierImmunization(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/immunizations/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Modify Immunization');

                        $('#employee_id').val(data.employee_id);
                        $('#vaccine_id').val(data.vaccine_id);
                        $('#is_vaccine').val(data.is_vaccine);
                        $('#reason').val(data.reason);
                        $('#date_immunization').val(data.date_immunization);



                        $('#idImmunization').val(data.id);

                        $("#ajouterImmunization").hide();
                        $("#updateImmunization").show();

                        $('#addImmunization').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updateImmunization() {

            let allValid = true;
            let date_immunization =  $('#date_immunization').val();
            let reason =  $('#reason').val();

            let employee_id = parseInt($('#employee_id').val()) ;
            let vaccine_id = parseInt($('#vaccine_id').val()) ;
            let is_vaccine = parseInt($('#is_vaccine').val()) ;

            let id =    $('#idImmunization').val();

            if(date_immunization ==='')
            {
                $('#erreurDate').text("Required  " );
                allValid = false;

            }


            if(employee_id === 0)
            {
                $('#erreurEmployee_id').text("Required" );
                allValid = false;

            }


            if(vaccine_id === 0)
            {
                $('#erreurvaccine_id').text("Required  " );
                allValid = false;

            }







            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/immunizations/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        employee_id:employee_id,
                        vaccine_id:vaccine_id,
                        is_vaccine:is_vaccine,
                        reason:reason,
                        date_immunization:date_immunization,



                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addImmunization').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Immunization   modify   with  success',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurEmployee_id').text(data.data.erreurEmployee_id);

                            $('#erreurvaccine_id').text(data.data.erreurvaccine_id);
                            $('#erreurDate').text(data.data.erreurDate);


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
                title: "Do you want to delete this immunization     ",
                icon: 'question',
                text: "",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel ",
                reverseButtons: !0
            }).then(function (e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{url('/immunizations/delete')}}/" + id,
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

        function fermerImmunization() {

            clearData();

            $('#myModalLabel').text('Add  Immunization');
            $('#addImmunization').modal('toggle');


        }


    </script>
@endsection
