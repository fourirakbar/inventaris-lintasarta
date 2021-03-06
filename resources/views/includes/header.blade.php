<a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="{{URL::asset('dist/img/logo.jpg')}}"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SI</b>NTARI</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{URL::asset('dist/img/avatar5.png')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->username }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{URL::asset('dist/img/avatar5.png')}}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->username }}
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div>
                  <a href="/editprofile/{{ Auth::user()->ID_REQUESTER }}" class="btn btn-default btn-flat pull-left">Edit Profile</a>
                  <a href="/logout" class="btn btn-default btn-flat pull-right">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>