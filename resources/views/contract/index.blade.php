@extends('layout.app')

@section('libelle')
    Contracts - List

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
                        <h4 class="mb-sm-0">Contracts </h4>

                        <div class="page-libelle-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard  </a></li>
                                <li class="breadcrumb-item active">Contracts </li>
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
                                        <h5 class="card-libelle mb-0">List of  Contracts </h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div>

                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#addContract "><i class="ri-add-line align-bottom me-1"></i> Add Contract  </button>

                                        <button type="button" class="btn btn-info"><i class="ri-printer-fill align-bottom me-1"></i> Export</button>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-bottom-dashed border-bottom">

                            <form>
                                <div class="row g-3">

                                    <!--end col-->
                                    <div class="col-xxl-4 col-sm-4">

                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-3 col-sm-3">
                                        <div>
                                            <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="idStatus">
                                                <option value="0"> Select contract type    </option>

                                                @php

                                                    $types = App\Models\ContractType::allContractTypeActifs();

                                                @endphp



                                                @foreach( $types  as $type )

                                                    <option value="{{$type->id}}">{{$type->name  }}</option>


                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-3 col-sm-3">
                                        <div>
                                            <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="idPayment">
                                                <option value="0"> Select Status    </option>

                                                <option value="{{\App\Types\StatutContrat ::EN_COURS }}">En cours </option>
                                                <option value="{{\App\Types\StatutContrat ::EXPIRE }}">Expiré  </option>
                                                <option value="{{\App\Types\StatutContrat ::INTERROMPU }}">Interrompu </option>

                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-xxl-2 col-sm-2">
                                        <div>
                                            <button type="button" class="btn btn-primary w-100" onclick="SearchData();"> <i class="ri-equalizer-fill me-1 align-bottom"></i>
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>

                        </div>
                        <div class="card-body">
                            <div>

                                @if (count($contracts) > 0)
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
                                            <th>Start   </th>
                                            <th>End   </th>
                                            <th>Status   </th>
                                            <th>Ending in    </th>


                                            <th>Actions</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $contracts as $contract  )

                                            <tr>
                                                <td data-id="{{$contract->id}}">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                    </div>
                                                </td>
                                                <td>  {{ $contract->employe->matricule }}</td>
                                                <td>  {{ $contract->employe->first_name.' '.$contract->employe->last_name }}</td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($contract->date_start)->translatedFormat('d F Y') }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($contract->date_end)->translatedFormat('d F Y') }}
                                                </td>

                                                    @php

                                                        $diff_in_days=\App\Models\Contract::getNbJourBetween($contract->id)

                                                    @endphp


                                                <td>
                                                    @if($diff_in_days>=0)
                                                        @php
                                                          $contract->status_contract = \App\Types\StatutContrat::EN_COURS  
                                                        @endphp
                                                        

                                                        <span class="badge badge-pill bg-success" data-key="t-new">IN PROGRESS</span>

                                                    @elseif($diff_in_days<0)
                                                        @php
                                                          $contract->status_contract = \App\Types\StatutContrat::EXPIRE  
                                                        @endphp                                                    

                                                        <span class="badge badge-pill bg-danger" data-key="t-new">EXPIRED</span>

                                                    @elseif($contract->status_contract = \App\Types\StatutContrat::INTERROMPU)

                                                        <span class="badge badge-pill bg-danger" data-key="t-new">INTERRUPTED </span>

                                                    @endif

                                                </td>

                                                <td>
                                                   
                                                @if($diff_in_days>7)
                                                
                                                <span class="badge badge-pill bg-success" data-key="t-new">{{ $diff_in_days }}</span>
                                                
                                                @elseif ($diff_in_days<=7 && $diff_in_days>0 )                                       
                                                <span class="badge badge-pill bg-success" data-key="t-new">{{ $diff_in_days }} Days</span>
                                                @elseif ($diff_in_days==0)
                                                  <span class="badge badge-pill bg-danger" data-key="t-new">EXPIRES TODAY</span>
                                                @else                                                 
                                                 <span class="badge badge-pill bg-danger" data-key="t-new">EXPIRED</span>
                                                @endif
                                                </td>

                                                <td>

                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                        <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" libelle="Modifier">
                                                            <a href="" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn modifierContract  ">
                                                                <i class="ri-pencil-fill fs-16"></i>
                                                            </a>
                                                        </li>

                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" libelle="Supprimer">
                                                            <a class="text-danger d-inline-block remove-item-btn supprimerContract " data-bs-toggle="modal" href="">
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
                                                    <p class="text-muted"> We did not find any Contract s  for you search.</p>


                                                </div>
                                            </div>


                                        @endif
                                    </div>

                            </div>
                            @include('contract.modal')


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

            let employe_id = parseInt($('#employe_id').val()) ;
            let contract_type_id = parseInt($('#contract_type_id').val()) ;




            if(date_start ==='')
            {
                $('#erreurDate_start').text("Required " );
                allValid = false;

            }

            if(date_end ==='')
            {
                $('#erreurDate_end').text("Required  " );
                allValid = false;

            }




            if(employe_id === 0)
            {
                $('#erreurEmploye').text("Required  " );
                allValid = false;

            }


            if(contract_type_id === 0)
            {
                $('#erreurcontract_type_id').text("Required  " );
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

            let employe_id = parseInt($('#employe_id').val()) ;
            let contract_type_id = parseInt($('#contract_type_id').val()) ;

            let id =    $('#idContract').val();





            if(date_start ==='')
            {
                $('#erreurDate_start').text("Required  " );
                allValid = false;

            }

            if(date_end ==='')
            {
                $('#erreurDate_end').text("Required  " );
                allValid = false;

            }




            if(employe_id === 0)
            {
                $('#erreurEmploye').text("Required  " );
                allValid = false;

            }


            if(contract_type_id === 0)
            {
                $('#erreurcontract_type_id').text("Required  " );
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
                                    title: 'Contract   modify with success',
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
                title: "Do you want to delete this contract     ",
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
