@extends('dashboard.layouts.master')
@section('title', 'Tambah User')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tambah User
            <small>Simomen</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="active">Tambah User</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row pull-right">
            <div class="col-md-3">
                <p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTambahUser">
                        Tambahkan User
                    </button>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Form Tambah User</h3>
                    </div>
                    <!-- /.box-header -->
                            <tbody>
                               @foreach($tambahUser as $tambahUser)
                                   <tr>
                                       <td style="vertical-align: middle;">{{ $tambahUser->name }}</td>
                                       <td style="vertical-align: middle;">{{ $tambahUser->email }}</td>
                                       <td style="vertical-align: middle;">{{ $tambahUser->password}}
                                       <td style="vertical-align: middle;">{{ $tambahUser->confirm_password}}</td>
                                       <td style="vertical-align: middle;">
                                           <div class="row">
                                               <div class="col-md-4">
                                                   <a href="{{ route('tambahuser.show', $tambahUser->id)  }}">
                                               <div class="col-md-4">
                                                   <form action="{{route('tambahuser.destroy', $tambahUser->name)}}" method="POST">
                                                       <input type="hidden" name="_method" value="DELETE">
                                                       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        
                                                   </form>
                                               </div>
                                           </div>
                                       </td>
                                   </tr>
                               @endforeach
                            </tbody>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row (main row) -->

        <div class="modal fade" id="createTambahUser">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center">Import/ExportFile</h4>
                    </div>
                    <div class="modal-body">
                        <!-- form start -->
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('tambahuser.store') }}" enctype="multipart/form-data">
                            <div class="panel body">
                 <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action{{url('importproduk')}}">
                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="confirm_password">
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Sign Up
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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