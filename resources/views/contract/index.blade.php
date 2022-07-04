@extends('layout.app')

@section('titre')
    Contracts - List

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
                    <h4 class="page-title">Contracts </h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="" class="btn btn-primary btn-rounded" data-toggle="modal"     data-target="#addContract"><i class="fa fa-plus"></i> Add Contract</a>
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
                    <div class="form-group form-focus">
                        <label class="focus-label">From</label>
                        <div class="cal-icon">
                            <input class="form-control floating " type="text">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <label class="focus-label">To</label>
                        <div class="cal-icon">
                            <input class="form-control floating " type="text">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <label class="focus-label">Status</label>
                        <select class="select floating">
                            <option value="0"> Select status   </option>



                            <option value="{{\App\Types\StatutContrat::EN_COURS}}">En cours </option>
                            <option value="{{\App\Types\StatutContrat::ANNULE}}">Annulé  </option>
                            <option value="{{\App\Types\StatutContrat::EXPIRE}}">Expiré  </option>
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
                                <th>Start   </th>
                                <th>End   </th>
                                <th>Status   </th>


                                <th class="text-right"style="width: 10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $contracts as $contract )
                                <tr>
                                    <td data-id="{{$contract->id}}">{{ $i++ }}</td>
                                    <td>  {{ $contract->employe->matricule }}</td>
                                    <td>  {{ $contract->employe->first_name.' '.$contract->employe->last_name }}</td>
                                    <td>


                                        {{ \Carbon\Carbon::parse($contract->date_start)->translatedFormat('d F Y') }}


                                    </td>

                                    <td>


                                        {{ \Carbon\Carbon::parse($contract->date_end)->translatedFormat('d F Y') }}


                                    </td>

                                    <td>

                                        @if($contract->type == \App\Types\StatutContrat::EN_COURS)

                                            <span class="custom-badge status-green">En cours  </span>
                                        @elseif($contract->type == \App\Types\StatutContrat::EXPIRE)

                                            <span class="custom-badge status-red">Expiré  </span>

                                        @elseif($contract->type == \App\Types\StatutContrat::ANNULE)

                                            <span class="custom-badge status-red">Expiré  </span>

                                        @endif

                                    </td>

                                    <td>  </td>



                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item modifierContract" href="#"><i class="fa fa-pencil m-r-5"></i> Modifier </a>



                                                <a class="dropdown-item supprimerContract" href="#" ><i class="fa fa-trash-o m-r-5 "></i> Suprimer </a>



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


        @include('contract.modal')

    </div>


@endsection



@section('js')
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>




   <script>


        jQuery(document).ready(function(){



            $( "#annulerContract" ).click(function( event ) {
                event.preventDefault();


                fermerContract()
            });


            $( "#updateContract" ).click(function( event ) {
                event.preventDefault();


                updateContract()
            });


            $( "#ajouterContract" ).click(function( event ) {
                event.preventDefault();


                ajouterContract()
            });


            $( ".modifierContract" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                modifierContract(id)
            });


            $( ".supprimerContract" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                deleteConfirmation(id)
            });

            clearData()

        });

        function clearData() {

            $('#employe_id').val('');
            $('#date_start').val('');
            $('#date_end').val('');
            $('#date_start_probation').val('');
            $('#date_end_probation').val('');
            $('#contract_type_id').val('');

            $('#erreurcontract_type_id').text('');
            $('#erreurDate_end').text('');
            $('#erreurDate_start').text('');
            $('#erreurEmploye').text('');

            $("#ajouterContract").show();
            $("#updateContract").hide();

        }



        //------------------------ fonction d' ajout de Contract
        function ajouterContract() {

            let allValid = true;
            let date_start =  $('#date_start').val();
            let date_end =  $('#date_end').val();
            let date_start_probation =  $('#date_start_probation').val();
            let date_end_probation =  $('#date_end_probation').val();

            let employe_id = parseInt($('#employe_id').val()) ;
            let contract_type_id = parseInt($('#contract_type_id').val()) ;




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




            if(employe_id === 0)
            {
                $('#erreurEmploye').text("L' employé      est obligatoire " );
                allValid = false;

            }


            if(contract_type_id === 0)
            {
                $('#erreurcontract_type_id').text("Le type de contrat      est obligatoire " );
                allValid = false;

            }


            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('contract_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        date_start:date_start,
                        date_end:date_end,
                        date_start_probation:date_start_probation,
                        date_end_probation:date_end_probation,
                        employe_id:employe_id,
                        contract_type_id:contract_type_id,


                    } ,

                    success: function(data) {


                        if(data.data.isValid)
                        {
                            $('#addContract').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Contract  add with succes ',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {


                            $('#erreurcontract_type_id').text(data.data.erreurcontract_type_id);

                            $('#erreurDate_end').text(data.data.erreurDate_end);
                            $('#erreurDate_start').text(data.data.erreurDate_start);
                            $('#erreurEmploye').text(data.data.erreurEmploye);



                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }

        //------------------------ fonction de modification du Contract
        function modifierContract(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/contracts/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Modify Contract');

                        $('#date_start').val(data.date_start);
                        $('#date_end').val(data.date_end);
                        $('#date_start_probation').val(data.date_start_probation);
                        $('#date_end_probation').val(data.date_end_probation);
                        $('#employe_id').val(data.employe_id);
                        $('#contract_type_id').val(data.contract_type_id);



                        $('#idContract').val(data.id);

                        $("#ajouterContract").hide();
                        $("#updateContract").show();

                        $('#addContract').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updateContract() {

            let allValid = true;
            let date_start =  $('#date_start').val();
            let date_end =  $('#date_end').val();
            let date_start_probation =  $('#date_start_probation').val();
            let date_end_probation =  $('#date_end_probation').val();

            let employe_id = parseInt($('#employe_id').val()) ;
            let contract_type_id = parseInt($('#contract_type_id').val()) ;

            let id =    $('#idContract').val();





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




            if(employe_id === 0)
            {
                $('#erreurEmploye').text("L' employé      est obligatoire " );
                allValid = false;

            }


            if(contract_type_id === 0)
            {
                $('#erreurcontract_type_id').text("Le type de contrat      est obligatoire " );
                allValid = false;

            }




            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/contracts/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        date_start:date_start,
                        date_end:date_end,
                        date_start_probation:date_start_probation,
                        date_end_probation:date_end_probation,
                        employe_id:employe_id,
                        contract_type_id:contract_type_id,



                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addContract').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Contract   modifiée  avec succès',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurcontract_type_id').text(data.data.erreurcontract_type_id);

                            $('#erreurDate_end').text(data.data.erreurDate_end);
                            $('#erreurDate_start').text(data.data.erreurDate_start);
                            $('#erreurEmploye').text(data.data.erreurEmploye);


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
                title: "Voulez-vous vraiment supprimer cet contrat     ",
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
                        url: "{{url('/contracts/delete')}}/" + id,
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

        function fermerContract() {

            clearData();

            $('#myModalLabel').text('Add  Contract');
            $('#addContract').modal('toggle');


        }


    </script>
@endsection
