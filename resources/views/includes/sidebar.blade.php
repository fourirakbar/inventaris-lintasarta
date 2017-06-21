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
        <li><a href="/Home"><i class="fa fa-home"></i> <span>Home</span></a></li>
        
        @if (Auth::user()->jenis_user == 'admin')
          <li><a href="{{ URL::to('showtikpro') }}"><i class="fa fa-calendar"></i> <span>Pengaturan Deadline</span></a></li>
        @else

        @endif
        

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Permintaan</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ URL::to('request') }}"><i class="fa fa-book"></i> <span>Input Permintaan</span></a></li>
            <li><a href="{{ URL::to('semuasudah') }}"><i class="fa fa-book"></i> <span>Permintaan Selesai</span></a></li>
            <li><a href="{{ URL::to('semuabelum') }}"><i class="fa fa-book"></i> <span>Permintaan Sedang Diproses</span></a></li>
            <li><a href="{{ URL::to('semua') }}"><i class="fa fa-book"></i> <span>Semua Permintaan</span></a></li>
            <li><a href="{{ URL::to('adminhapus') }}"><i class="fa fa-book"></i> <span>Pengajuan Pembatalan</span></a></li>
          </ul>
        </li>
      </ul>
    </section>