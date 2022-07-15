@extends('layout.app')

@section('libelle')
    Employees - List

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
                        <h4 class="mb-sm-0">Employees </h4>

                        <div class="page-libelle-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard  </a></li>
                                <li class="breadcrumb-item active">Employees </li>
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
                                        <h5 class="card-libelle mb-0">Employees  List</h5>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div>

                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#addEmploye"><i class="ri-add-line align-bottom me-1"></i> Add Employee </button>

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
                                        <div>
                                            <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="idStatus">
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
                                    <!--end col-->
                                    <div class="col-xxl-3 col-sm-3">
                                        <div>
                                            <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="idStatus">
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
                                    <!--end col-->
                                    <div class="col-xxl-3 col-sm-3">
                                        <div>
                                            <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="idPayment">
                                                <option value="0"> Select type   </option>



                                                <option value="{{\App\Types\TypeEmploye::NATIONAL}}">National</option>
                                                <option value="{{\App\Types\TypeEmploye::EXPATRIE}}">Expatriate </option>

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

                                @if (count($employes) > 0)
                                    <table id="alternative-pagination" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">

                                        <thead>
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                </div>
                                            </th>

                                            <th>Employee Id   </th>
                                            <th>Name    </th>
                                            <th>Age     </th>
                                            <th>Gender </th>
                                            <th>Date Start</th>
                                            <th>NAT/EXP </th>                            
                                            <th>Actions</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $employes as $employe )

                                            <tr>
                                                <td data-id="{{$employe->id}}">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                                    </div>
                                                </td>
                                                <td>  {{ $employe->matricule }}</td>
                                                <td>  {{ $employe->first_name.' '.$employe->last_name }}</td>
                                                <td>
                                                    @if($employe->birth_date_correct)

                                                        {{ \App\Models\Employe::getAgeEmploye($employe->id) }}

                                                     @endif
                                                </td>
                                                <td> 
                                                    @if($employe->gender == \App\Types\Gender::MASCULIN)
            
                                                   Male 
                                                @endif
            
                                                    @if($employe->gender == \App\Types\Gender::FEMININ)
            
                                                        Female 
                                                    @endif   
                                                </td>
                                                 
                                                <td>

                                                    {{ \Carbon\Carbon::parse($employe->date_debut)->translatedFormat('d F Y') }}


                                                </td>

                                                <td>

                                                    @if($employe->type == \App\Types\TypeEmploye::NATIONAL)


                                                        <span class="badge badge-pill bg-success" data-key="t-new">National</span>


                                                    @endif

                                                    @if($employe->type == \App\Types\TypeEmploye::EXPATRIE)



                                                        <span class="badge badge-pill bg-danger" data-key="t-new">Expatriate</span>


                                                    @endif

                                                </td>
                                    
                                                <td>

                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                        <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" libelle="Modifier">
                                                            <a href="" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn modifierEmploye ">
                                                                <i class="ri-pencil-fill fs-16"></i>
                                                            </a>
                                                        </li>

                                                        <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" libelle="Supprimer">
                                                            <a class="text-danger d-inline-block remove-item-btn supprimerEmploye" data-bs-toggle="modal" href="">
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
                                                    <p class="text-muted"> We did not find any Employes  for you search.</p>


                                                </div>
                                            </div>


                                        @endif
                                    </div>

                            </div>
                            @include('employe.modal')


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
            $('#phone_perso').val('');
            $('#phone_pro').val('');
            $('#email_perso').val('');
            $('#email_pro').val('');
            $('#address').val('');
            $('#num_cnss').val('');
            $('#num_policy').val('');
            $('#band_id').val('');
            $('#countrie_id').val('');
            $('#prefecture_id').val('');
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
            let phone_perso =  $('#phone_perso').val();
            let phone_pro =  $('#phone_pro').val();
            let email_perso =  $('#email_perso').val();
            let email_pro =  $('#email_pro').val();
            let address =  $('#address').val();
            let num_cnss =  $('#num_cnss').val();
            let num_policy =  $('#num_policy').val();
            let band_id =  $('#band_id').val();
            let countrie_id = $('#countrie_id').val() ;
            let prefecture_id = $('#prefecture_id').val() ;



            let birth_date_correct =  $('#birth_date_correct').val();
            let departement_id = parseInt($('#departement_id').val()) ;
            let type = parseInt($('#type').val()) ;
            let gender = parseInt($('#gender').val()) ;



            if(matricule ==='')
            {
                $('#erreurMatricule').text("Required " );
                allValid = false;

            }

            if(first_name ==='')
            {
                $('#erreurfirst_name').text("Required " );
                allValid = false;

            }

            if(last_name ==='')
            {
                $('#erreurlast_name').text("Required " );
                allValid = false;

            }


            if(birth_date_correct ==='')
            {
                $('#erreurBirth_date').text("Required " );
                allValid = false;

            }

            if(departement_id === 0)
            {
                $('#erreurdepartement_id').text("Required " );
                allValid = false;

            }


            if(type === 0)
            {
                $('#erreurtype').text("Required " );
                allValid = false;

            }


            if(gender === 0)
            {
                $('#erreurgender').text("Required " );
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

                        phone_perso:phone_perso,
                        phone_pro:phone_pro,
                        email_perso:email_perso,
                        email_pro:email_pro,
                        address:address,
                        num_cnss:num_cnss,
                        num_policy:num_policy,
                        band_id:band_id,
                       countrie_id:countrie_id,
                        prefecture_id:prefecture_id,



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

            let phone_perso =  $('#phone_perso').val();
            let phone_pro =  $('#phone_pro').val();
            let email_perso =  $('#email_perso').val();
            let email_pro =  $('#email_pro').val();
            let address =  $('#address').val();
            let num_cnss =  $('#num_cnss').val();
            let num_policy =  $('#num_policy').val();
            let band_id =  $('#band_id').val();
            let countrie_id = $('#countrie_id').val()  ;
            let prefecture_id = $('#prefecture_id').val() ;

            let departement_id = parseInt($('#departement_id').val()) ;
            let type = parseInt($('#type').val()) ;
            let gender = parseInt($('#gender').val()) ;




            let id =    $('#idEmploye').val();




            if(matricule ==='')
            {
                $('#erreurMatricule').text("Required " );
                allValid = false;

            }

            if(first_name ==='')
            {
                $('#erreurfirst_name').text("Required " );
                allValid = false;

            }

            if(last_name ==='')
            {
                $('#erreurlast_name').text("Required " );
                allValid = false;

            }


            if(birth_date_correct ==='')
            {
                $('#erreurBirth_date').text("Required " );
                allValid = false;

            }

            if(departement_id === 0)
            {
                $('#erreurdepartement_id').text("Required" );
                allValid = false;

            }


            if(type === 0)
            {
                $('#erreurtype').text("Required" );
                allValid = false;

            }


            if(gender === 0)
            {
                $('#erreurtype').text("Required " );
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

                        phone_perso:phone_perso,
                        phone_pro:phone_pro,
                        email_perso:email_perso,
                        email_pro:email_pro,
                        address:address,
                        num_cnss:num_cnss,
                        num_policy:num_policy,
                        band_id:band_id,
                        countrie_id:countrie_id,
                        prefecture_id:prefecture_id,



                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addEmploye').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Employee   modify   with  success',
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
                title: "Do  you want to delete this  employee    ",
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
