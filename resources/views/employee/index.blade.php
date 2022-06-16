@extends('layout.app')

@section('title')

    Employees

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
@endsection



@section('entete')

    <div class="content-header sty-one">
        <h1 class="text-black">Employees</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> Employees </li>
        </ol>
    </div>

@endsection


@section('contenu')


    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Employee</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="{{route('employee_add')}}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Employee</a>
                </div>
            </div>
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <label class="focus-label">Employee ID</label>
                        <input type="text" class="form-control floating">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <label class="focus-label">Employee Name</label>
                        <input type="text" class="form-control floating">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus select-focus">
                        <label class="focus-label">Role</label>
                        <select class="select floating">
                            <option>Manager</option>
                            <option>Assistant</option>

                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <a href="#" class="btn btn-success btn-block"> Search </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table">
                            <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Birth date</th>
                                <th>Gender</th>
                                <th> Nationality</th>
                                <th>Email</th>
                                <th style="min-width: 110px;">Join Date</th>
                                <th>Role</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $employees as $employee )
                                <tr>
                                    <td data-id="{{$employee->id}}"> 001</td>
                                    <td> {{ $employee->first_name }}</td>
                                    <td> {{ $employee->last_name }}</td>
                                    <td> {{ $employee->birth_date }}</td>
                                    <td> {{ $employee->Gender }}</td>
                                    <td> {{ $employee->nationality_id }}</td>

                                    <td>


                                        <button type="button" class="js-mytooltip btn btn-outline-success modifierDepartement" data-mytooltip-custom-class="align-center"
                                                data-mytooltip-content="Modifier " ><i class="fa fa-pencil"></i>  </button>


                                        <button type="button" class="js-mytooltip btn btn-outline-danger supprimerDepartement" data-mytooltip-custom-class="align-center"
                                                data-mytooltip-content="Supprimer " ><i class="fa fa-trash"></i>  </button>



                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="notification-box">
            <div class="msg-sidebar notifications msg-noti">
                <div class="topnav-dropdown-header">
                    <span>Messages</span>
                </div>
                <div class="drop-scroll msg-list-scroll" id="msg_list">
                    <ul class="list-box">
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">R</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Richard Miles </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item new-message">
                                    <div class="list-left">
                                        <span class="avatar">J</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">John Doe</span>
                                        <span class="message-time">1 Aug</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">T</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Tarah Shropshire </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">M</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Mike Litorus</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">C</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Catherine Manseau </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">D</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Domenic Houston </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">B</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Buster Wigton </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">R</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Rolland Webber </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">C</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Claire Mapes </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">M</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Melita Faucher</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">J</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Jeffery Lalor</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">L</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Loren Gatlin</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="chat.html">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">T</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Tarah Shropshire</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="chat.html">See all messages</a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script>


        jQuery(document).ready(function(){

            $( "#addEmployee" ).click(function( event ) {
                event.preventDefault();
                addEmployee()

            });

            $( "#updateEmployee" ).click(function( event ) {
                event.preventDefault();


                updateEmployee(id)
            });


            $( "#deleteEmployee" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));
                deleteConfirmation(id)
            });

            $( "#cancelEmployee" ).click(function( event ) {
                event.preventDefault();
                cancelEmployee()


            });

            clearData()

        });

        function clearData() {

            $('#matricule').val('');
            $('#first_name').val('');
            $('#last_name').val('');
            $('#dob').val('');
            $('#gender').val('');
            $('#address').val('');
            $('#password').val('');
            $('#telpro').val('');
            $("#telperso").val('');
            $("#emailpro").val('');
            $('#emailperso').val('');
            $('#cnss').val('');
            $("#policy").val('');
            $("#nationality").val('');

            $('#erreurMatricule').text('');
            $('#erreurFirst_name').text('');
            $('#erreurlast_name').text('');
            $('#erreurDate').text('');
            $('#erreurGender').text('');
            $('#erreurNationality').text('');

            $("#addEmployee").show();
            $("#updateEmployee").hide();
            $('#deleteEmployee').hide();
            $("#cancelEmployee").show();

        }



        //------------------------ fonction d' ajout
        function addEmployee() {

            let allValid = true;
            let matricule =  $('#matricule').val();
            let first_name =  $('#first_name').val();
            let last_name =  $('#last_name').val();
            let dob =  $('#dob').val();
            let gender =  $('#gender').val();
            let address =  $('#address').val();
            let password =  $('#password').val();
            let telpro =  $('#telpro').val();
            let telperso =  $('#telperso').val();
            let emailpro =  $('#emailpro').val();
            let cnss =  $('#cnss').val();
            let policy =  $('#policy').val();
            let nationality =  $('#nationality').val();

            if(matricule ==='')
            {
                $('#erreurMatricule').text("Le libelle  est obligatoire " );
                allValid = false;

            }

            if(code ==='')
            {
                $('#erreurCode').text("Le code  est obligatoire " );
                allValid = false;

            }




            if (allValid) {

                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "{{route('departement_store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:{
                        code:code,
                        libelle:libelle,


                    } ,

                    success: function(data) {


                        if(data.data.isValid)
                        {
                            $('#addDepartement').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Département   ajouté avec succès',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurLibelle').text(data.data.erreurLibelle);

                        }




                    },

                    error: function(data) {

                        console.log(data);

                    }



                });

            }




        }

        //------------------------ fonction de modification du Departement
        function modifierDepartement(id) {

            $.ajax(

                {
                    type: 'GET',
                    dataType: 'json',
                    url: "/departements/modifier/"+id,

                    success: function (data) {

                        console.log(data);

                        $('#myModalLabel').text('Modifier un département');

                        $('#libelle').val(data.libelle);

                        $('#idDepartement').val(data.id);

                        $("#ajouterDepartement").hide();
                        $("#modifierDepartement").show();

                        $('#addDepartement').modal('toggle');

                    }



                }
            )



        }

        //------------------------ Update de Annee
        function updateDepartement() {

            let allValid = true;
            let libelle =  $('#libelle').val();


            let id =    $('#idDepartement').val();



            if(libelle ==='')
            {
                $('#erreurLibelle').text("Le libelle  est obligatoire " );
                allValid = false;

            }





            if (allValid) {
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: "/departements/update/"+id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


                    data:{
                        libelle:libelle,

                    } ,


                    success: function(data) {



                        if(data.data.isValid)
                        {
                            $('#addDepartement').modal('toggle');

                            Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Département   modifiée  avec succès',
                                    showConfirmButton: false,


                                },

                                setTimeout(function(){
                                    location.reload();
                                },2000));


                        }else {
                            $('#erreurLibelle').text(data.data.erreurLibelle);


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
                title: "Voulez-vous vraiment supprimer ce département ",
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
                        url: "{{url('/departements/delete')}}/" + id,
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

        function fermerBusiness() {

            clearData();

            $('#myModalLabel').text('Ajouter un business  ');
            $('#addBusiness').modal('toggle');


        }


    </script>

@endsection


