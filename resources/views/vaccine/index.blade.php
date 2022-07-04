@extends('layout.app')

@section('titre')
    Vaccines - List

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
                    <h4 class="page-title">Vaccines </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addVaccine"><i class="fa fa-plus"></i> Add Vaccine</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th>Disease   </th>
                                <th>Name   </th>


                                <th>Nb doses   </th>


                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $vaccines as $vaccine )
                                <tr>
                                    <td data-id="{{$vaccine->id}}">{{ $i++ }}</td>
                                    <td>  {{ $vaccine->disease->libelle }}</td>
                                    <td>  {{ $vaccine->name }}</td>
                                    <td>  {{ $vaccine->nb_doses }}</td>






                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierVaccine" href="#"><i class="fa fa-pencil m-r-5"></i> Modifier </a>



                                                <a class="dropdown-item supprimerVaccine" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Suprimer </a>



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


        @include('vaccine.modal')

    </div>


@endsection



@section('js')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



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
                $('#erreurName').text("Le name   est obligatoire " );
                allValid = false;

            }

            if(nb_doses === 0)
            {
                $('#erreurnb_doses').text("Le nombre de doses   est obligatoire " );
                allValid = false;

            }


            if(disease_id === 0)
            {
                $('#erreurdisease_id').text("Le disease   est obligatoire " );
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

                        $('#myModalLabel').text('Modify Vaccine');

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
                $('#erreurName').text("Le name   est obligatoire " );
                allValid = false;

            }

            if(nb_doses === 0)
            {
                $('#erreurnb_doses').text("Le nombre de doses   est obligatoire " );
                allValid = false;

            }


            if(disease_id === 0)
            {
                $('#erreurdisease_id').text("Le disease   est obligatoire " );
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
                                    title: 'Vaccine   modifiée  avec succès',
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
                title: "Voulez-vous vraiment supprimer ce vaccin    ",
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
