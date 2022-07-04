@extends('layout.app')

@section('titre')
    Employes - List

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
                    <h4 class="page-title">Employes </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addEmploye"><i class="fa fa-plus"></i> Add Employe</a>
                </div>
            </div>

            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <label class="focus-label">Search</label>
                        <input type="text" class="form-control floating">
                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <label class="focus-label">Type</label>
                        <select class="select floating"  name="department_search" id="department_search" style="width: 100%; height:36px;">


                            <option value="0"> Select type   </option>



                                <option value="{{\App\Types\TypeEmploye::NATIONAL}}">National</option>
                                <option value="{{\App\Types\TypeEmploye::EXPATRIE}}">Expatriate </option>


                        </select>

                    </div>
                </div>

                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <label class="focus-label">Departments</label>
                        <select class="select floating"  name="department_search" id="department_search" style="width: 100%; height:36px;">


                            <option value="0"> Select department   </option>

                            @php

                                $departements = App\Models\Departement::allDepartementActifs();

                            @endphp



                            @foreach( $departements  as $departement )

                                <option value="{{$departement->id}}">{{$departement->title  }}</option>


                            @endforeach



                        </select>

                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <label class="focus-label">Position</label>
                        <select class="select floating"  name="position_search" id="position_search" style="width: 100%; height:36px;">


                            <option value="0"> Select position   </option>

                            @php

                                $positions = App\Models\Position::allPositionActifs();

                            @endphp



                            @foreach( $positions  as $position )

                                <option value="{{$position->id}}">{{$position->job_title  }}</option>


                            @endforeach



                        </select>

                    </div>
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
                                <th>Mail  </th>
                                <th>Type   </th>
                                <th>Departement   </th>
                                <th>Position    </th>





                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $employes as $employe )
                                <tr>
                                    <td data-id="{{$employe->id}}">{{ $i++ }}</td>
                                    <td>  {{ $employe->matricule }}</td>
                                    <td>  {{ $employe->first_name.' '.$employe->last_name }}</td>
                                    <td>  {{ $employe->phone_pro }}</td>
                                    <td>
                                    <td>

                                        @if($employe->type == \App\Types\TypeEmploye::NATIONAL)

                                            <span class="custom-badge status-red">National </span>
                                        @else

                                            <span class="custom-badge status-green">Expatrié </span>

                                        @endif

                                    </td>

                                    <td>  {{ $employe->departement->title }}</td>

                                    <td>  {{ $employe->position->title }} </td>



                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierEmploye" href="#"><i class="fa fa-pencil m-r-5"></i> Modifier </a>



                                                <a class="dropdown-item supprimerEmploye" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Suprimer </a>



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


        @include('employe.modal')

    </div>


@endsection



@section('js')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



   <script>


        jQuery(document).ready(function(){



            $( "#annulerEmploye" ).click(function( event ) {
                event.preventDefault();


                fermerEmploye()
            });


            $( "#updateEmploye" ).click(function( event ) {
                event.preventDefault();


                updateEmploye()
            });


            $( "#ajouterEmploye" ).click(function( event ) {
                event.preventDefault();


                ajouterEmploye()
            });


            $( ".modifierEmploye" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierEmploye(id)
            });


            $( ".supprimerEmploye" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                deleteConfirmation(id)
            });

            clearData()

        });

        function clearData() {

            $('#matricule').val('');
            $('#first_name').val('');
            $('#last_name').val('');
            $('#usual_name').val('');
            $('#birth_date').val('');
            $('#birth_date_correct').val('');
            $('#departement_id').val('');
            $('#type').val('');
            $('#gender').val('');



            $('#erreurMatricule').text('');
            $('#erreurfirst_name').text('');
            $('#erreurlast_name').text('');
            $('#erreurBirth_date').text('');
            $('#erreurdepartement_id').text('');
            $('#erreurtype').text('');
            $('#erreurgender').text('');



            $("#ajouterEmploye").show();
            $("#updateEmploye").hide();

        }



        //------------------------ fonction d' ajout de Employe
        function ajouterEmploye() {

            let allValid = true;
            let matricule =  $('#matricule').val();
            let first_name =  $('#first_name').val();
            let usual_name =  $('#usual_name').val();
            let last_name =  $('#last_name').val();
            let birth_date =  $('#birth_date').val();
            let birth_date_correct =  $('#birth_date_correct').val();
            let departement_id = parseInt($('#departement_id').val()) ;
            let type = parseInt($('#type').val()) ;
            let gender = parseInt($('#gender').val()) ;



            if(matricule ==='')
            {
                $('#erreurMatricule').text("Le matricule   est obligatoire " );
                allValid = false;

            }

            if(first_name ==='')
            {
                $('#erreurfirst_name').text("Le first name    est obligatoire " );
                allValid = false;

            }

            if(last_name ==='')
            {
                $('#erreurlast_name').text("Le last  name    est obligatoire " );
                allValid = false;

            }


            if(birth_date_correct ==='')
            {
                $('#erreurBirth_date').text("Le birth date correct     est obligatoire " );
                allValid = false;

            }

            if(departement_id === 0)
            {
                $('#erreurdepartement_id').text("Le departement     est obligatoire " );
                allValid = false;

            }


            if(type === 0)
            {
                $('#erreurtype').text("Le type     est obligatoire " );
                allValid = false;

            }


            if(gender === 0)
            {
                $('#erreurtype').text("Le gender     est obligatoire " );
                allValid = false;

            }




            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('employe_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        matricule:matricule,
                        first_name:first_name,
                        last_name:last_name,
                        usual_name:usual_name,
                        birth_date:birth_date,
                        birth_date_correct:birth_date_correct,
                        departement_id:departement_id,
                        type:type,
                        gender:gender,

                    } ,

                    success: function(data) {


                        if(data.data.isValid)
                        {
                            $('#addEmploye').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Employe  add with succes ',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {


                            $('#erreurtype').text(data.data.erreurtype);

                            $('#erreurgender').text(data.data.erreurgender);
                            $('#erreurdepartement_id').text(data.data.erreurdepartement_id);
                            $('#erreurBirth_date').text(data.data.erreurBirth_date);
                            $('#erreurlast_name').text(data.data.erreurlast_name);
                            $('#erreurfirst_name').text(data.data.erreurfirst_name);
                            $('#erreurMatricule').text(data.data.erreurMatricule);


                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }

        //------------------------ fonction de modification du Employe
        function modifierEmploye(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/employes/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Modify Employe');

                        $('#matricule').val(data.matricule);
                        $('#first_name').val(data.first_name);
                        $('#last_name').val(data.last_name);
                        $('#usual_name').val(data.usual_name);
                        $('#birth_date').val(data.birth_date);
                        $('#birth_date_correct').val(data.birth_date_correct);
                        $('#departement_id').val(data.departement_id);
                        $('#type').val(data.type);
                        $('#gender').val(data.gender);


                        $('#idEmploye').val(data.id);

                        $("#ajouterEmploye").hide();
                        $("#updateEmploye").show();

                        $('#addEmploye').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updateEmploye() {

            let allValid = true;
            let matricule =  $('#matricule').val();
            let first_name =  $('#first_name').val();
            let usual_name =  $('#usual_name').val();
            let last_name =  $('#last_name').val();
            let birth_date =  $('#birth_date').val();
            let birth_date_correct =  $('#birth_date_correct').val();
            let departement_id = parseInt($('#departement_id').val()) ;
            let type = parseInt($('#type').val()) ;
            let gender = parseInt($('#gender').val()) ;

            let id =    $('#idEmploye').val();




            if(matricule ==='')
            {
                $('#erreurMatricule').text("Le matricule   est obligatoire " );
                allValid = false;

            }

            if(first_name ==='')
            {
                $('#erreurfirst_name').text("Le first name    est obligatoire " );
                allValid = false;

            }

            if(last_name ==='')
            {
                $('#erreurlast_name').text("Le last  name    est obligatoire " );
                allValid = false;

            }


            if(birth_date_correct ==='')
            {
                $('#erreurBirth_date').text("Le birth date correct     est obligatoire " );
                allValid = false;

            }

            if(departement_id === 0)
            {
                $('#erreurdepartement_id').text("Le departement     est obligatoire " );
                allValid = false;

            }


            if(type === 0)
            {
                $('#erreurtype').text("Le type     est obligatoire " );
                allValid = false;

            }


            if(gender === 0)
            {
                $('#erreurtype').text("Le gender     est obligatoire " );
                allValid = false;

            }




            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/employes/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        matricule:matricule,
                        first_name:first_name,
                        last_name:last_name,
                        usual_name:usual_name,
                        birth_date:birth_date,
                        birth_date_correct:birth_date_correct,
                        departement_id:departement_id,
                        type:type,
                        gender:gender,



                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addEmploye').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Employe   modifiée  avec succès',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurtype').text(data.data.erreurtype);

                            $('#erreurgender').text(data.data.erreurgender);
                            $('#erreurdepartement_id').text(data.data.erreurdepartement_id);
                            $('#erreurBirth_date').text(data.data.erreurBirth_date);
                            $('#erreurlast_name').text(data.data.erreurlast_name);
                            $('#erreurfirst_name').text(data.data.erreurfirst_name);
                            $('#erreurMatricule').text(data.data.erreurMatricule);


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
                title: "Voulez-vous vraiment supprimer cet employé    ",
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
                        url: "{{url('/employes/delete')}}/" + id,
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

        function fermerEmploye() {

            clearData();

            $('#myModalLabel').text('Add  Employe');
            $('#addEmploye').modal('toggle');


        }


    </script>
@endsection
