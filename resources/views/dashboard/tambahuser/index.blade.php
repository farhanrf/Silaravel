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
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Tambahkan User</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <tbody>
                            @if($tambahUser)
                               @foreach($tambahUser as $tambahUser)
                                   <tr>
                                       <td style="vertical-align: middle;">{{ $tambahUser->name }}</td>
                                       <td style="vertical-align: middle;">{{ $tambahUser->email }}</td>
                                       <td style="vertical-align: middle;">{{ $tambahUser->password}}</td>
                                       <td style="vertical-align: middle;">{{ $tambahUser->username}}</td>
                                       <td style="vertical-align: middle;">{{ $tambahUser->role}}</td>
                                       <td style="vertical-align: middle;">
                                                   </form>
                                               </div>
                                           </div>
                                       </td>
                                   </tr>
                               @endforeach
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

                                {{ csrf_field() }}

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title" style="padding-top:0; margin-top:0; color:#f00;">Tambah User</h3>
            </div>
            <hr/>
            <div class="box-body">  
                <?php 
                    if (isset($_POST['save'])) {
                        $tambahUser->($_POST['name'],$_POST['email'],$_POST['password'],$_POST['username'],$_POST['role']);
                        echo "<div class='alert alert-info alert-dismissable' id='divAlert'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                Data Tersimpan
                                </div>";
                    }
                ?>  
                <form method="POST" id="forminput" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="nama" id="formnama" placeholder="Masukan Username">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="formemail" placeholder="Masukan Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pass" id="formpass" placeholder="Masukan Password">
                    </div>
                    <button id="formbtn" class="btn btn-primary" name="save"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        setTimeout(function(){$("#divAlert").fadeOut(900)}, 500);
    });
    function validateText(id){
        if ($('#'+id).val()== null || $('#'+id).val()== "") {
            var div = $('#'+id).closest('div');
            div.addClass("has-error has-feedback");
            return false;
        }
        else{
            var div = $('#'+id).closest('div');
            div.removeClass("has-error has-feedback");
            return true;    
        }
    }
    $(document).ready(function(){
        $("#formbtn").click(function(){
            if (!validateText('formemail')) {
                $('#formemail').focus();
                return false;
            }
            if (!validateText('formpass')) {
                $('#formpass').focus();
                return false;
            }
            if (!validateText('formnama')) {
                $('#formnama').focus();
                return false;
            }
            if (!validateText('formgambar')) {
                $('#formgambar').focus();
                return false;
            }
            return true;
        });
    });
</script>

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
