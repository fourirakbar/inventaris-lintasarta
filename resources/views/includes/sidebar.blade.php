<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{URL::asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->username}}</p>

          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="#"><i class="fa fa-book"></i> <span>Dashboard</span></a></li>
        
        
        <li><a href="{{ URL::to('edittikpro') }}"><i class="fa fa-book"></i> <span>Pengaturan Tanggal</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Permintaan</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ URL::to('request') }}"><i class="fa fa-book"></i> <span>Input Permintaan</span></a></li>
            <li><a href="{{ URL::to('semuasudah') }}"><i class="fa fa-book"></i> <span>Permintaan Sudah di Proses</span></a></li>
            <li><a href="{{ URL::to('semuabelum') }}"><i class="fa fa-book"></i> <span>Permintaan Belum di Proses</span></a></li>
            <li><a href="{{ URL::to('semua') }}"><i class="fa fa-book"></i> <span>Semua Permintaan</span></a></li>
          </ul>
        </li>
      </ul>
    </section>