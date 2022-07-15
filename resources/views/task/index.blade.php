@extends('layout.app')

@section('libelle')
    Tasks - List

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
                        <h4 class="mb-sm-0">Tasks </h4>

                        <div class="page-libelle-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard  </a></li>
                                <li class="breadcrumb-item active">Tasks </li>
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
                                        <h5 class="card-libelle mb-0">List of  Tasks </h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div>

                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#addTask"><i class="ri-add-line align-bottom me-1"></i> Add Task </button>

                                       <button type="button" class="btn btn-info"><i class="ri-printer-fill align-bottom me-1"></i> Export</button>


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div>

                                @if (count($tasks) > 0)
                                    <table id="alternative-pagination" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">

                                        <thead>
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                </div>
                                            </th>

                                            <th>Name </th>
                                <th>Date </th>
                                <th>Description </th>
                                <th>Status</th>

                                            <th>Actions</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $tasks as $task )

                                            <tr>
                                                <td data-id="{{$task->id}}">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                    </div>
                                                </td>



                                  <td>  {{ $task->libelle }}</td>

                                    <td>


                                        {{ \Carbon\Carbon::parse($task->date_task)->translatedFormat('d F Y') }}


                                    </td>

                                    <td>  {{ $task->description }}</td>



                                    <td>

                                        @if($task->accomplie == \App\Types\StatutTask::EN_COURS)



                                            <span class="badge badge-pill bg-danger" data-key="t-new">En cours </span>


                                        @elseif($task->accomplie == \App\Types\StatutTask::ANNULE)



                                            <span class="badge badge-pill bg-danger" data-key="t-new">Annulé </span>


                                        @else



                                            <span class="badge badge-pill bg-danger" data-key="t-new">Terminé  </span>


                                        @endif

                                    </td>



                                  <td>

                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                        <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" libelle="Modifier">
                                                            <a href="" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn modifierTask ">
                                                                <i class="ri-pencil-fill fs-16"></i>
                                                            </a>
                                                        </li>

                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" libelle="Supprimer">
                                                            <a class="text-danger d-inline-block remove-item-btn supprimerTask" data-bs-toggle="modal" href="">
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
                                                    <p class="text-muted"> We did not find any Tasks  for you search.</p>


                                                </div>
                                            </div>


                                        @endif
                                    </div>

                            </div>
                            @include('task.modal')


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



            $( "#annulerTask" ).click(function( event ) {
                event.preventDefault();


                fermerTask()
            });


            $( "#updateTask" ).click(function( event ) {
                event.preventDefault();


                updateTask()
            });


            $( "#ajouterTask" ).click(function( event ) {
                event.preventDefault();


                ajouterTask()
            });


            $( ".modifierTask" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierTask(id)
            });


            $( ".supprimerTask" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                deleteConfirmation(id)
            });

            clearData()

        });

        function clearData() {

            $('#libelle').val('');
            $('#date_task').val('');
            $('#description').val('');
            $('#accomplie').val('');


            $('#erreurLibelle').text('');
            $('#erreurDate_task').text('');
            $('#erreurDescription').text('');
            $('#erreurAccomplie').text('');



            $("#ajouterTask").show();
            $("#updateTask").hide();

        }



        //------------------------ fonction d' ajout de Continent
        function ajouterTask() {

            let allValid = true;
            let libelle = ($('#libelle').val());
            let date_task =  $('#date_task').val();
            let description =  $('#description').val();
            let accomplie =  parseInt($('#accomplie').val());



            if(libelle ==='')
            {
                $('#erreurLibelle').text("Required " );
                allValid = false;

            }
            if(date_task ==='')
            {
                $('#erreurDate_task').text("Required " );
                allValid = false;

            }if(description ==='')
            {
                $('#erreurDescription').text("Required " );
                allValid = false;

            }if(accomplie === 0)
            {
                $('#erreurAccomplie').text("Required " );
                allValid = false;

            }




            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('task_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        libelle:libelle,
                        date_task:date_task,
                        description:description,
                        accomplie:accomplie,

                    } ,

                    success: function(data) {

                        if(data.data.isValid)
                        {
                            $('#addTask').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Entry added ',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {


                            $('#erreurLibelle').text(data.data.erreurLibelle);
                            $('#erreurDate_task').text(data.data.erreurDate_task);
                            $('#erreurDescription').text(data.data.erreurDescription);
                            $('#erreurAccomplie').text(data.data.erreurAccomplie);


                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }

        //------------------------ fonction de modification


        function modifierTask(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/tasks/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Edit Task');

                        $('#libelle').val(data.libelle);
                        $('#date_task').val(data.date_task);
                        $('#description').val(data.description);
                        $('#accomplie').val(data.accomplie);




                        $('#idTask').val(data.id);

                        $("#ajouterTask").hide();
                        $("#updateTask").show();

                        $('#addTask').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updateTask() {

            let allValid = true;
            let libelle = ($('#libelle').val());
            let date_task =  $('#validity').val();
            let description =  $('#description').val();
            let accomplie = parseInt($('#accomplie').val())  ;

            let id =    $('#idTask').val();



            if(libelle ==='')
            {
                $('#erreurLibelle').text("Required " );
                allValid = false;

            }
            if(date_task ==='')
            {
                $('#erreurDate_task').text("Required " );
                allValid = false;

            }if(description ==='')
            {
                $('#erreurDescription').text("Required " );
                allValid = false;

            }if(accomplie === 0)
            {
                $('#erreurAccomplie').text("Required " );
                allValid = false;

            }





            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/tasks/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        libelle:libelle,
                        date_task:date_task,
                        description:description,
                        accomplie:accomplie,
                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addTask').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Done',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurLibelle').text(data.data.erreurLibelle);
                            $('#erreurDate_task').text(data.data.erreurDate_task);
                            $('#erreurDescription').text(data.data.erreurDescription);
                            $('#erreurAccomplie').text(data.data.erreurAccomplie);


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
                title: "Do you really want to delete this entry ?? ",
                icon: 'question',
                text: "",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                reverseButtons: !0
            }).then(function (e) {

                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        type: 'POST',
                        url: "{{url('/tasks/delete')}}/" + id,
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

        function fermerTask() {

            clearData();

            $('#myModalLabel').text('Add Task');
            $('#addTask').modal('toggle');


        }


    </script>


@endsection
