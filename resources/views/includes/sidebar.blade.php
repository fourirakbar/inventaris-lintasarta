<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{URL::asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->username }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="#"><i class="fa fa-book"></i> <span>Dashboard</span></a></li>
        <li><a href="{{ URL::to('request') }}"><i class="fa fa-book"></i> <span>Input Permintaan</span></a></li>
        <li><a href="{{ URL::to('semua') }}"><i class="fa fa-book"></i> <span>Lihat Data Permintaan</span></a></li>
        <li><a href="{{ URL::to('edittikpro') }}"><i class="fa fa-book"></i> <span>Pengaturan Tanggal</span></a></li>
      </ul>
    </section>