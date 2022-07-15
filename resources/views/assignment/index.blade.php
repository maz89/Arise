@extends('layout.app')

@section('title')
    Assignments - List

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

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Assignments </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard  </a></li>
                                <li class="breadcrumb-item active">Assignments </li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="customerList">
                        <div class="card-header border-bottom-dashed">

                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <div>
                                        <h5 class="card-title mb-0">List of  Assignments </h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div>

                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#addAssignment"><i class="ri-add-line align-bottom me-1"></i> Add Assignment </button>

                                        <button type="button" class="btn btn-info"><i class="ri-printer-fill align-bottom me-1"></i> Export</button>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-bottom-dashed border-bottom">
                            <form>
                                <div class="row g-4">

                                    <div class="col-xl-12">
                                        <div class="row g-3">

                                            <!--end col-->
                                            <div class="col-sm-4">

                                            </div>
                                            <!--end col-->

                                            <!--end col-->
                                            <div class="col-sm-3">
                                                <div>
                                                    <select class="form-control" data-plugin="choices" data-choices data-choices-search-false name="choices-single-default" id="idStatus">


                                                        <option value="0">Position </option>

                                                        @php

                                                            $positions = \App\Models\Position::allPositionActifs();


                                                        @endphp

                                                        @foreach( $positions as $position )

                                                            <option value="{{$position->id}}">{{$position->job_title}} </option>

                                                        @endforeach


                                                    </select>


                                                </div>
                                            </div>
                                            <!--end col-->

                                            <!--end col-->
                                            <div class="col-sm-3">
                                                <div>
                                                    <select class="form-control" data-plugin="choices" data-choices data-choices-search-false name="choices-single-default" id="idStatus">


                                                        <option value="0">Department </option>

                                                        @php

                                                            $departments = \App\Models\Departement::allDepartementActifs();


                                                        @endphp

                                                        @foreach( $departments as $department )

                                                            <option value="{{$department->id}}">{{$department->title}} </option>

                                                        @endforeach


                                                    </select>



                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-sm-2">
                                                <div>
                                                    <button type="button" class="btn btn-primary w-100" > <i class="ri-equalizer-fill me-2 align-bottom"></i>Search</button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <div class="card-body">
                            <div>

                                @if (count($assignments) > 0)
                                    <table id="alternative-pagination" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">

                                        <thead>
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                </div>
                                            </th>

                                            <th>Employee </th>
                                            <th>Department  </th>
                                            <th>Position </th>
                                            <th>Date start   </th>
                                            <th>Is manager  </th>

                                            <th>Actions </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $assignments as $assignment )

                                            <tr>
                                                <td data-id="{{$assignment->id}}">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                    </div>
                                                </td>
                                                <td>
                                                    {{ $assignment->employee->firstname .' '.$assignment->employee->lastname }}
                                                </td>


                                                <td>

                                                    @if($assignment->department_id)
                                                    {{ $assignment->department->title  }}

                                                    @endif
                                                </td>


                                                <td>
                                                    {{ $assignment->position->job_title  }}
                                                </td>

                                                <td>


                                                    {{ \Carbon\Carbon::parse($assignment->date_start)->translatedFormat('d F Y') }}


                                                </td>

                                                <td>

                                                    @if($assignment->is_manager )

                                                        <span class="badge bg-success">

                                                              {{$assignment->business->title}}




                                                        </span>
                                                    @else


                                                        <span class="badge bg-danger"> False</span>



                                                    @endif



                                                </td>



                                                <td>

                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                        <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Modifier">
                                                            <a href="" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn modifierAssignment ">
                                                                <i class="ri-pencil-fill fs-16"></i>
                                                            </a>
                                                        </li>

                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Supprimer">
                                                            <a class="text-danger d-inline-block remove-item-btn supprimerAssignment" data-bs-toggle="modal" href="">
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
                                                    <p class="text-muted"> We did not find any assignments  for you search.</p>


                                                </div>
                                            </div>


                                        @endif
                                    </div>

                            </div>
                            @include('assignment.modal')


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



            $( "#updateAssignment" ).click(function( event ) {
                event.preventDefault();


                updateAssignment()
            });





            $( "#ajouterAssignment" ).click(function( event ) {
                event.preventDefault();


                ajouterAssignment()
            });


            $( ".modifierAssignment" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierAssignment(id)
            });






            $( ".supprimerAssignment" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                deleteConfirmation(id)
            });

            clearData()

        });

        function clearData() {

            $('#date_start').val('');
            $('#date_end').val('');
            $('#position_id').val('');
            $('#employee_id').val('');
            $('#department_id').val('');
            $('#is_manager').val('');
            $('#is_encours').val('');
            $('#business_id').val('');
            $('#erreurDate_start').text('');
            $('#erreurDate_end').text('');
            $('#erreurEmployee_id').text('');
            $('#erreurposition_id').text('');

            $("#ajouterAssignment").show();
            $("#updateAssignment").hide();

        }



        //------------------------ fonction d' ajout de Assignment
        function ajouterAssignment() {

            let allValid = true;
            let date_start =  $('#date_start').val();
            let date_end =  $('#date_end').val();
            let position_id = parseInt($('#position_id').val()) ;
            let employee_id = parseInt($('#employee_id').val()) ;
            let department_id = parseInt($('#department_id').val()) ;
            let is_manager = parseInt($('#is_manager').val()) ;
            let is_encours = parseInt($('#is_encours').val()) ;
            let business_id = parseInt($('#business_id').val()) ;

            if(date_start ==='')
            {
                $('#erreurDate_start').text("Required " );
                allValid = false;

            }

            if(date_end === '')
            {
                $('#erreurDate_end').text("Required " );
                allValid = false;

            }


            if(position_id === 0)
            {
                $('#erreurposition_id').text("Required " );
                allValid = false;

            }

            if(employee_id === 0)
            {
                $('#erreurEmployee_id').text("Required " );
                allValid = false;

            }






            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('assignment_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        date_start:date_start,
                        date_end:date_end,
                        position_id:position_id,
                        employee_id:employee_id,
                        department_id:department_id,
                        is_manager:is_manager,
                        is_encours:is_encours,
                        business_id:business_id,


                    } ,

                    success: function(data) {

                        console.log(data.data)


                        if(data.data.isValid)
                        {
                            $('#addAssignment').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Assignment add with success ',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {


                            $('#erreurDate_start ').text(data.data.erreurDate_start );
                            $('#erreurDate_end').text(data.data.erreurDate_end);
                            $('#erreurEmployee_id').text(data.data.erreurEmployee_id);
                            $('#erreurposition_id').text(data.data.erreurposition_id);


                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }



        //------------------------ fonction d' affichage d 'une offre '
        function modifierAssignment(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/assignments/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Modifier un Assignment');

                        $('#date_start').val(data.date_start);
                        $('#date_end').val(data.date_end);
                        $('#position_id').val(data.position_id);
                        $('#employee_id').val(data.employee_id);
                        $('#department_id').val(data.department_id);
                        $('#is_manager').val(data.is_manager);
                        $('#is_encours').val(data.is_encours);
                        $('#business_id').val(data.business_id);


                        $('#idAssignment').val(data.id);

                        $("#ajouterAssignment").hide();
                        $("#updateAssignment").show();

                        $('#addAssignment').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updateAssignment() {

            let allValid = true;
            let date_start =  $('#date_start').val();
            let date_end =  $('#date_end').val();
            let position_id = parseInt($('#position_id').val()) ;
            let employee_id = parseInt($('#employee_id').val()) ;
            let department_id = parseInt($('#department_id').val()) ;
            let is_manager = parseInt($('#is_manager').val()) ;
            let is_encours = parseInt($('#is_encours').val()) ;
            let business_id = parseInt($('#business_id').val()) ;

            let id =    $('#idAssignment').val();



            if(date_start ==='')
            {
                $('#erreurDate_start').text("Required " );
                allValid = false;

            }

            if(date_end === '')
            {
                $('#erreurDate_end').text("Required " );
                allValid = false;

            }


            if(position_id === 0)
            {
                $('#erreurposition_id').text("Required " );
                allValid = false;

            }

            if(employee_id === 0)
            {
                $('#erreurEmployee_id').text("Required " );
                allValid = false;

            }






            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/assignments/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        date_start:date_start,
                        date_end:date_end,
                        position_id:position_id,
                        employee_id:employee_id,
                        department_id:department_id,
                        is_manager:is_manager,
                        is_encours:is_encours,
                        business_id:business_id,

                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addAssignment').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Assignment   update  with  success',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {


                            $('#erreurDate_start ').text(data.data.erreurDate_start );
                            $('#erreurDate_end').text(data.data.erreurDate_end);
                            $('#erreurEmployee_id').text(data.data.erreurEmployee_id);
                            $('#erreurposition_id').text(data.data.erreurposition_id);


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
                title: "Do you want to delete this assignment ",
                icon: 'question',
                text: "",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Valid",
                cancelButtonText: "Cancel",
                reverseButtons: !0
            }).then(function (e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{url('/assignments/delete')}}/" + id,
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






    </script>

@endsection
