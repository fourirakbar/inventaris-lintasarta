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
        <li><a href="/home"><i class="fa fa-home"></i> <span>Home</span></a></li>
        @if(Auth::user()->jenis_user == 'admin')
        <li class="treeview">
            <a href="#">
              <i class="fa fa-calendar"></i>
              <span>Pengaturan Tikpro</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ URL::to('showtikpro') }}"><i class="fa fa-book"></i> <span>Pengaturan Deadline</span></a></li>
              <li><a href="{{ URL::to('log_click') }}"><i class="fa fa-search"></i> <span>Log Update Tikpro</span></a></li>
            </ul>
          </li>
        @endif
        @if(Auth::user()->jenis_user == 'admin')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Permintaan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ URL::to('request') }}"><i class="fa fa-book"></i> <span>Input Permintaan</span></a></li>
            
            <li><a href="{{ URL::to('semuasudah') }}"><i class="fa fa-book"></i> <span>Permintaan Selesai</span></a></li>
            <li><a href="{{ URL::to('semuabelum') }}"><i class="fa fa-book"></i> <span>Permintaan Sedang Diproses</span></a></li>
            <li><a href="{{ URL::to('semua') }}"><i class="fa fa-book"></i> <span>Histori Permintaan</span></a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Pengajuan Pembatalan</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ URL::to('adminhapus/request') }}"><i class="fa fa-circle-o"></i> Permintaan Pembatalan</a></li>
                <li><a href="{{ URL::to('adminhapus') }}"><i class="fa fa-circle-o"></i> Histori Pembatalan</a></li>
              </ul>
            </li>            
          </ul>
        </li>
        @else
        <li><a href="{{ URL::to('caripermintaan') }}"><i class="fa fa-search"></i> Cari Permintaan</a></li>
        @endif
        @if(Auth::user()->jenis_user == 'admin')
        <li class="treeview">
            <a href="#">
              <i class="fa fa-calendar"></i>
              <span>Alokasi Barang Keluar</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ URL::to('/barangkeluar') }}"><i class="fa fa-book"></i> <span>Input Barang Keluar</span></a></li>
              <li><a href="{{ URL::to('/barangkeluar/show') }}"><i class="fa fa-search"></i> <span>Histori Barang Keluar</span></a></li>
            </ul>
          </li>
        @endif
        @if(Auth::user()->jenis_user == 'admin')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Peminjaman</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ URL::to('/peminjaman') }}"><i class="fa fa-book"></i> <span>Input Peminjaman</span></a></li>
            
            <li><a href="{{ URL::to('/peminjaman/show/belum') }}"><i class="fa fa-book"></i> <span>Lihat Data Peminjaman Belum</span></a></li>
            <li><a href="{{ URL::to('/peminjaman/show/sudah') }}"><i class="fa fa-book"></i> <span>Lihat Data Peminjaman Sudah</span></a>
            <li><a href="{{ URL::to('/peminjaman/show') }}"><i class="fa fa-book"></i> <span>Histori Data Peminjaman</span></a>

          </ul>
        </li>
        @else
        <li><a href="{{ URL::to('caripeminjaman') }}"><i class="fa fa-search"></i> <span>Cari Peminjaman</span></a></li>
        @endif
        @if(Auth::user()->jenis_user == 'admin')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Perbaikan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ URL::to('repair/input') }}"><i class="fa fa-book"></i> <span>Input Data Perbaikan</span></a></li>
            <li><a href="{{ URL::to('repair/show/belum') }}"><i class="fa fa-book"></i> <span>Lihat Data Perbaikan Belum</span></a></li>
            <li><a href="{{ URL::to('repair/show/sudah') }}"><i class="fa fa-book"></i> <span>Lihat Data Perbaikan Sudah</span></a></li>
            <li><a href="{{ URL::to('repair/show') }}"><i class="fa fa-book"></i> <span>Histori Data Perbaikan</span></a></li>
          </ul>
        </li>
        @endif
        @if(Auth::user()->jenis_user == 'admin')
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Database Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ URL::to('barang') }}"><i class="fa fa-book"></i> <span>Input Barang</span></a></li>
            <li><a href="{{ URL::to('showbarang') }}"><i class="fa fa-book"></i> <span>Lihat Semua Barang</span></a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-share"></i> <span>Pengaturan Rack</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ URL::to('rack') }}"><i class="fa fa-circle-o"></i> Tambah Rack Baru</a></li>
                <li><a href="{{ URL::to('rack/show') }}"><i class="fa fa-circle-o"></i> Lihat Semua Rack</a></li>
              </ul>
            </li>
          </ul>
        </li>
        @endif
          
        {{-- @if(Auth::user()->jenis_user == 'admin')
          <li><a href="{{ URL::to('register') }}"><i class="fa fa-user"></i> <span>Tambah User Baru</span></a></li>
        @endif --}}
      </ul>
    </section>
