@extends('layout.app')

@section('title')

    Positions

@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('dist/plugins/datatables/css/dataTables.bootstrap.min.css') }}">

@endsection



@section('entete')

    <div class="content-header sty-one">
        <h1 class="text-black">Positions</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> Positions </li>
        </ol>
    </div>

@endsection


@section('contenu')


    <!-- Main content -->
    <div class="content">
        <div class="info-box">

            <button type="button" class="btn btn-success" data-toggle="modal"     data-target="#addBusiness"><i class="fa fa-plus"></i> Add </button>
            <br>

            <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover" data-name="cool-table">
                    <thead>
                    <tr>
                        <th> #</th>
                        <th>Name</th>


                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $i = 1;


                    @endphp

                    @foreach( $positions as $position )
                        <tr>
                            <td data-id="{{$position->id}}"> 001</td>
                            <td> {{ $position->title }}</td>

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


@endsection

@section('js')

    <!-- DataTable -->
    <script src="{{ asset('dist/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>

    <script src="{{ asset('dist/plugins/table-expo/filesaver.min.js') }}"></script>
    <script src="{{ asset('dist/plugins/table-expo/xls.core.min.js') }}"></script>
    <script src="{{ asset('dist/plugins/table-expo/tableexport.js') }}"></script>
    <script>
        $("table").tableExport({formats: ["xlsx"], });
    </script>

@endsection


