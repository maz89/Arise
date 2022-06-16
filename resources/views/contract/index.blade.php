@extends('layout.app')

@section('title')

   Contracts

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}" />

@endsection

@section('contenu')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-5 col-5">
                    <h4 class="page-title">Contracts</h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="{{route('contract_add')}}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Contracts</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Date Start </th>
                                <th>Date End</th>
                                <th>Probation</th>
                                <th>Contract Type</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $i = 1;


                            @endphp

                            @foreach( $contracts as $contract )
                                <tr>
                                    <td data-id="{{$contract->id}}">{{$contract->id}}</td>
                                    <td> {{ $contract->date_start }}</td>
                                    <td>{{ $contract->date_end }}</td>
                                    <td> {{ $contract->probation }}</td>
                                    <td>{{ $contract->contract_type_id }}</td>

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

    </div>



@endsection

@section('js')

    <!-- DataTable -->
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



    <script>


        jQuery(document).ready(function(){


            $( ".deleteBusiness" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));

                deleteConfirmation(id)
            });

        });

        //------------------------ fonction de suppression du business

        function deleteConfirmation(id) {

            Swal.fire({
                title: "Voulez-vous vraiment supprimer ce business ",
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
                        url: "{{url('/business/delete')}}/" + id,
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        success: function (results) {

                            console.log(results.success)
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




    </script>


@endsection


