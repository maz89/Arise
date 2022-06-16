@extends('layout.app')

@section('title')

   Apartment

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}" />

@endsection

@section('contenu')

    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-sm-5 col-5">
                    <h4 class="page-title">Apartment</h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="{{route('apartment_add')}}" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Apartment</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0 datatable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>nb_rooms</th>
                                <th>num_apartment</th>
                                <th>building_id</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $i = 1;


                            @endphp

                            @foreach( $apartments as $apartment )
                            <tr>
                                <td data-id="{{$apartment->id}}"> {{ $apartment->id }}</td>
                                <td> {{ $apartment->nb_rooms }}</td>
                                <td>{{ $apartment->num_apartment }}</td>
                                <td>{{ $apartment->building_id }}</td>
                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="edit-department.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item deleteApartment" href="#" data-toggle="modal" data-target="#delete_business"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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

    </div>



@endsection

@section('js')

    <!-- DataTable -->
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('assets/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>



    <script>


        jQuery(document).ready(function(){


            $( ".deleteApartment" ).click(function( event ) {
                event.preventDefault();

                let currentRow=$(this).closest("tr");

                let id = parseInt(currentRow.find("td:eq(0)").attr('data-id'));

                deleteConfirmation(id)
            });

        });

        //------------------------ fonction de suppression du business

        function deleteConfirmation(id) {

            Swal.fire({
                title: "Do you really want to delete this apartment? ",
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
                        url: "{{url('/apartments/delete')}}/" + id,
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


