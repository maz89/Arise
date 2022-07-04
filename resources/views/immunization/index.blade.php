@extends('layout.app')

@section('titre')
    Immunizations - List

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
                    <h4 class="page-title">Immunizations </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addImmunization"><i class="fa fa-plus"></i> Add Immunization</a>
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
                                <th>Vaccine    </th>
                                <th>Disease    </th>
                                <th>Date    </th>
                                <th>is Vaccine   </th>


                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $immunizations as $immunization )
                                <tr>
                                    <td data-id="{{$immunization->id}}">{{ $i++ }}</td>
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





                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierImmunization" href="#"><i class="fa fa-pencil m-r-5"></i> Modifier </a>



                                                <a class="dropdown-item supprimerImmunization" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Suprimer </a>



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


        @include('immunization.modal')

    </div>


@endsection



@section('js')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



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
                $('#erreurDate').text("La date    est obligatoire " );
                allValid = false;

            }


            if(employee_id === 0)
            {
                $('#erreurEmployee_id').text("L' employé      est obligatoire " );
                allValid = false;

            }


            if(vaccine_id === 0)
            {
                $('#erreurvaccine_id').text("Le vaccin     est obligatoire " );
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
                $('#erreurDate').text("La date    est obligatoire " );
                allValid = false;

            }


            if(employee_id === 0)
            {
                $('#erreurEmployee_id').text("L' employé      est obligatoire " );
                allValid = false;

            }


            if(vaccine_id === 0)
            {
                $('#erreurvaccine_id').text("Le vaccin     est obligatoire " );
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
                                    title: 'Immunization   modifiée  avec succès',
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
                title: "Voulez-vous vraiment supprimer cet immunization     ",
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
