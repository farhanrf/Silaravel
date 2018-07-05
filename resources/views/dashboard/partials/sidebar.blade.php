<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ Request::is('dashboard') ? "active" : "" }}"><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li class="{{ Request::is('dashboard/barangmasuk') ? "active" : "" }}"><a href="{{ route('barangmasuk.index') }}"><i class="fa fa-arrow-circle-right"></i> <span>Barang Masuk</span></a></li>
            <li class="{{ Request::is('dashboard/barangkeluar') ? "active" : "" }}"><a href="{{ route('barangkeluar.index') }}"><i class="fa fa-arrow-circle-left"></i> <span>Barang Keluar</span></a></li>
           <li class="{{ Request::is('dashboard/databarang') ? "active" : "" }}"><a href="{{ route('databarang.index') }}"><i class="fa fa-database"></i> <span>Data Barang</span></a></li>
           <li class="{{ Request::is('dashboard/tambahuser') ? "active" : "" }}"><a href="{{ route('tambahuser.index') }}"><i class="fa fa-user"></i> <span>Tambah User</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
