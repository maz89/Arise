@extends('layout.app')

@section('titre')
    Assignments - List

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
                    <h4 class="page-title">Assignments </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addAssignment"><i class="fa fa-plus"></i> Add Assignment</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th>Matricule     </th>
                                <th>Name    </th>
                                <th>Start   </th>
                                <th>End   </th>
                                <th>Position    </th>
                                <th>Is Manager     </th>
                                <th>Is En cours     </th>


                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $assignments as $assignment )
                                <tr>
                                    <td data-id="{{$assignment->id}}">{{ $i++ }}</td>
                                    <td>  {{ $assignment->employe->matricule }}</td>
                                    <td>  {{ $assignment->employe->first_name.' '.$assignment->employe->last_name }}</td>
                                    <td>


                                        {{ \Carbon\Carbon::parse($assignment->date_start)->translatedFormat('d F Y') }}


                                    </td>

                                    <td>


                                        {{ \Carbon\Carbon::parse($assignment->date_end)->translatedFormat('d F Y') }}


                                    </td>



                                    <td> {{ $assignment->position->job_title }} </td>
                                    <td>

                                        @if($assignment->is_manager == 0)

                                            <span class="custom-badge status-red">No  </span>


                                        @else

                                            <span class="custom-badge status-green">Yes  </span>

                                        @endif

                                    </td>

                                    <td>

                                        @if($assignment->is_encours == 0)

                                            <span class="custom-badge status-red">No  </span>


                                        @else

                                            <span class="custom-badge status-green">Yes  </span>

                                        @endif

                                    </td>



                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierAssignment" href="#"><i class="fa fa-pencil m-r-5"></i> Modifier </a>



                                                <a class="dropdown-item supprimerAssignment" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Suprimer </a>



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


        @include('assignment.modal')

    </div>


@endsection



@section('js')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



   <script>


        jQuery(document).ready(function(){



            $( "#annulerAssignment" ).click(function( event ) {
                event.preventDefault();


                fermerAssignment()
            });


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
            $('#business_id').val('');

            $('#erreurDate_start').text('');
            $('#erreurDate_end').text('');
            $('#erreurEmployee_id').text('');
            $('#erreurposition_id').text('');

            $("#ajouterAssignment").show();
            $("#updateAssignment").hide();
            $("#department_id").hide();
            $("#business_id").hide();

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
            let business_id = parseInt($('#business_id').val()) ;




            if(date_start ==='')
            {
                $('#erreurDate_start').text("La date de start    est obligatoire " );
                allValid = false;

            }

            if(date_end ==='')
            {
                $('#erreurDate_end').text("La date end    est obligatoire " );
                allValid = false;

            }




            if(employee_id === 0)
            {
                $('#erreurEmployee_id').text("L' employé      est obligatoire " );
                allValid = false;

            }


            if(position_id === 0)
            {
                $('#erreurposition_id').text("Le position    est obligatoire " );
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
                        business_id:business_id,

                    } ,

                    success: function(data) {


                        if(data.data.isValid)
                        {
                            $('#addAssignment').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Assignment  add with succes ',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {


                            $('#erreurDate_start').text(data.data.erreurDate_start);

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

        //------------------------ fonction de modification du Assignment
        function modifierAssignment(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/assignments/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Modify Assignment');

                        $('#date_start').val(data.date_start);
                        $('#date_end').val(data.date_end);
                        $('#position_id').val(data.position_id);
                        $('#employee_id').val(data.employee_id);
                        $('#department_id').val(data.department_id);
                        $('#is_manager').val(data.is_manager);
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
            let business_id = parseInt($('#business_id').val()) ;

            let id =    $('#idAssignment').val();


            if(date_start ==='')
            {
                $('#erreurDate_start').text("La date de start    est obligatoire " );
                allValid = false;

            }

            if(date_end ==='')
            {
                $('#erreurDate_end').text("La date end    est obligatoire " );
                allValid = false;

            }




            if(employee_id === 0)
            {
                $('#erreurEmployee_id').text("L' employé      est obligatoire " );
                allValid = false;

            }


            if(position_id === 0)
            {
                $('#erreurposition_id').text("Le position    est obligatoire " );
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
                        business_id:business_id,



                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addAssignment').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Assignment   modifiée  avec succès',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurDate_start').text(data.data.erreurDate_start);

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
                title: "Voulez-vous vraiment supprimer cet  assignment     ",
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

        //------------------------ fonction de fermeture de popup

        function fermerAssignment() {

            clearData();

            $('#myModalLabel').text('Add  Assignment');
            $('#addAssignment').modal('toggle');


        }


    </script>
@endsection
