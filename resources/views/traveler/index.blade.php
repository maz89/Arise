@extends('layout.app')

@section('titre')
    Travelers - List

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
                    <h4 class="page-title">Travelers </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addTraveler"><i class="fa fa-plus"></i> Add Traveler</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                            <tr>
                                <th style="width: 5%">#</th>

                                <th>Name    </th>
                                <th>Countrie   </th>
                                <th>Business    </th>
                                <th>Nature    </th>
                                <th>Trip purpose    </th>


                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $travelers as $traveler )
                                <tr>
                                    <td data-id="{{$traveler->id}}">{{ $i++ }}</td>

                                    <td>  {{ $traveler->first_name .' '.$traveler->last_name }}</td>


                                    <td> {{$traveler->countrie->libelle}} </td>
                                    <td> {{$traveler->business->title}} </td>
                                    <td> {{$traveler->nature->libelle}} </td>
                                    <td> {{$traveler->trip_purpose}} </td>



                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierTraveler" href="#"><i class="fa fa-pencil m-r-5"></i> Modifier </a>



                                                <a class="dropdown-item supprimerTraveler" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Suprimer </a>



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


        @include('traveler.modal')

    </div>


@endsection



@section('js')

    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



   <script>


        jQuery(document).ready(function(){



            $( "#annulerTraveler" ).click(function( event ) {
                event.preventDefault();


                fermerTraveler()
            });


            $( "#updateTraveler" ).click(function( event ) {
                event.preventDefault();


                updateTraveler()
            });


            $( "#ajouterTraveler" ).click(function( event ) {
                event.preventDefault();


                ajouterTraveler()
            });


            $( ".modifierTraveler" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierTraveler(id)
            });


            $( ".supprimerTraveler" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                deleteConfirmation(id)
            });

            clearData()

        });

        function clearData() {

            $('#firstname').val('');
            $('#lastname').val('');
            $('#countrie_id').val('');
            $('#business_id').val('');
            $('#nature_id').val('');
            $('#trip_purpose').val('');

            $('#erreurFirstname').text('');
            $('#erreurLastname').text('');
            $('#erreurCountrie').text('');
            $('#erreurNature').text('');

            $("#ajouterTraveler").show();
            $("#updateTraveler").hide();

        }



        //------------------------ fonction d' ajout de Traveler
        function ajouterTraveler() {

            let allValid = true;
            let firstname =  $('#firstname').val();
            let lastname =  $('#lastname').val();
            let trip_purpose =  $('#trip_purpose').val();


            let countrie_id = parseInt($('#countrie_id').val()) ;
            let business_id = parseInt($('#business_id').val()) ;
            let nature_id = parseInt($('#nature_id').val()) ;




            if(firstname ==='')
            {
                $('#erreurFirstname').text("Le fisrt name     est obligatoire " );
                allValid = false;

            }

            if(lastname ==='')
            {
                $('#erreurLastname').text("Le last name      est obligatoire " );
                allValid = false;

            }


            if(countrie_id === 0)
            {
                $('#erreurCountrie').text("Le pays       est obligatoire " );
                allValid = false;

            }


            if(nature_id === 0)
            {
                $('#erreurNature').text("La nature     est obligatoire " );
                allValid = false;

            }


            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('traveler_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        firstname:firstname,
                        lastname:lastname,
                        trip_purpose:trip_purpose,
                        countrie_id:countrie_id,
                        business_id:business_id,
                        nature_id:nature_id,


                    } ,

                    success: function(data) {


                        if(data.data.isValid)
                        {
                            $('#addTraveler').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Traveler  add with succes ',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {


                            $('#erreurFirstname').text(data.data.erreurFirstname);

                            $('#erreurLastname').text(data.data.erreurLastname);
                            $('#erreurCountrie').text(data.data.erreurCountrie);
                            $('#erreurNature').text(data.data.erreurNature);



                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }

        //------------------------ fonction de modification du Traveler
        function modifierTraveler(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/travelers/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Modify Traveler');

                        $('#firstname').val(data.firstname);
                        $('#lastname').val(data.lastname);
                        $('#trip_purpose').val(data.trip_purpose);
                        $('#countrie_id').val(data.countrie_id);
                        $('#business_id').val(data.business_id);
                        $('#nature_id').val(data.nature_id);



                        $('#idTraveler').val(data.id);

                        $("#ajouterTraveler").hide();
                        $("#updateTraveler").show();

                        $('#addTraveler').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updateTraveler() {

            let allValid = true;
            let firstname =  $('#firstname').val();
            let lastname =  $('#lastname').val();
            let trip_purpose =  $('#trip_purpose').val();


            let countrie_id = parseInt($('#countrie_id').val()) ;
            let business_id = parseInt($('#business_id').val()) ;
            let nature_id = parseInt($('#nature_id').val()) ;

            let id =    $('#idTraveler').val();




            if(firstname ==='')
            {
                $('#erreurFirstname').text("Le fisrt name     est obligatoire " );
                allValid = false;

            }

            if(lastname ==='')
            {
                $('#erreurLastname').text("Le last name      est obligatoire " );
                allValid = false;

            }


            if(countrie_id === 0)
            {
                $('#erreurCountrie').text("Le pays       est obligatoire " );
                allValid = false;

            }


            if(nature_id === 0)
            {
                $('#erreurNature').text("La nature     est obligatoire " );
                allValid = false;

            }


            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/travelers/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        firstname:firstname,
                        lastname:lastname,
                        trip_purpose:trip_purpose,
                        countrie_id:countrie_id,
                        business_id:business_id,
                        nature_id:nature_id,



                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addTraveler').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Traveler   modifiée  avec succès',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurFirstname').text(data.data.erreurFirstname);

                            $('#erreurLastname').text(data.data.erreurLastname);
                            $('#erreurCountrie').text(data.data.erreurCountrie);
                            $('#erreurNature').text(data.data.erreurNature);


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
                title: "Voulez-vous vraiment supprimer cet traveler     ",
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
                        url: "{{url('/travelers/delete')}}/" + id,
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

        function fermerTraveler() {

            clearData();

            $('#myModalLabel').text('Add  Traveler');
            $('#addTraveler').modal('toggle');


        }


    </script>
@endsection
