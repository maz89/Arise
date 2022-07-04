@extends('layout.app')

@section('titre')
    Tasks - List

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
                    <h4 class="page-title">Tasks </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addTask"><i class="fa fa-plus"></i> Add Task</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th>Name </th>
                                <th>Date </th>
                                <th>Description </th>
                                <th>Status</th>

                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $tasks as $task )
                                <tr>
                                    <td data-id="{{$task->id}}">{{ $i++ }}</td>
                                    <td>  {{ $task->libelle }}</td>

                                    <td>


                                        {{ \Carbon\Carbon::parse($task->date_task)->translatedFormat('d F Y') }}


                                    </td>

                                    <td>  {{ $task->description }}</td>
                                    <td>

                                        {{ $task->accomplie }}


                                    </td>


                                    <td>

                                        @if($task->type == \App\Types\StatutTask::EN_COURS)

                                            <span class="custom-badge status-red">En cours  </span>


                                        @elseif($contract->type == \App\Types\StatutTask::ANNULE)

                                            <span class="custom-badge status-red">Annulé   </span>


                                        @else

                                            <span class="custom-badge status-green">Terminé   </span>


                                        @endif

                                    </td>




                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierTask" href="#"><i class="fa fa-pencil m-r-5"></i> Edit </a>



                                                <a class="dropdown-item supprimerTask" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Delete </a>



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

        @include('task.modal')

    </div>


@endsection



@section('js')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



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
            let date_task =  $('#validity').val();
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

