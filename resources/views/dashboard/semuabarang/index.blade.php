@extends('dashboard.layouts.master')
@section('title', 'Semua Barang')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            All Device
            <small>Simomen</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">All Device</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row pull-right">
            <div class="col-md-3">
                <p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createSemuaBarang">
                        Tambahkan Barang
                    </button>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Daftar Barang</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Device</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>User</th>
                                <th>Category</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($semuaBarang->count() > 0)
                               @foreach($semuaBarang as $semuaBarang)
                                   <tr>
                                       <td style="vertical-align: middle;">{{ $semuaBarang->id }}</td>
                                       <td style="vertical-align: middle;">{{ $semuaBarang->name }}</td>
                                       <td style="vertical-align: middle;">{{ $semuaBarang->status }}</td>
                                       <td style="vertical-align: middle;">{{ $semuaBarang->device->no_registration }} - {{ $barangMasuk->device->name }}</td>
                                       <td style="vertical-align: middle;">{{ $semuaBarang->date }}</td>
                                       <td style="vertical-align: middle;">{{ $semuaBarang->location->name }}</td>
                                       <td style="vertical-align: middle;">{{ $semuaBarang->users->name }}</td>
                                       <td style="vertical-align: middle;">{{ $semuaBarang->category->name }}</td>
                                       <td style="vertical-align: middle;">
                                           <div class="row">
                                               <div class="col-md-4">
                                                   <a href="{{ route('semuabarang.show', $semuaBarang->id)  }}" class="btn btn-info">
                                                       Edit
                                                   </a>
                                               </div>
                                               <div class="col-md-4">
                                                   <form action="{{route('semuabarang.destroy', $semuaBarang->id)}}" method="POST">
                                                       <input type="hidden" name="_method" value="DELETE">
                                                       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                       <button type="submit" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger">Delete</button>
                                                   </form>
                                               </div>
                                           </div>
                                       </td>
                                   </tr>
                               @endforeach
                            @else
                            <tr>
                               <td>Data Not Available</td>
                            </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row (main row) -->

        <div class="modal fade" id="createSemuaBarang">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center">Tambahkan Barang</h4>
                    </div>
                    <div class="modal-body">
                        <!-- form start -->
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('semuabarang.store') }}" enctype="multipart/form-data">
                            <div class="box-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
    </section>
    <!-- /.content -->
@endsection
@push('script')
<!-- date-range-picker -->
<script src="/assets/bower_components/moment/min/moment.min.js"></script>
<script src="/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })
    });
</script>
@endpush
