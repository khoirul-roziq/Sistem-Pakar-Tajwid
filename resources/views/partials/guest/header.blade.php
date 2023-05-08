<div class="navbar navbar-fixed">
  <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark teal lighten-1">
    <div class="nav-wrapper">
      {{-- <div class="header-search-wrapper hide-on-med-and-down"><i class="material-icons">search</i>
        <input class="header-search-input z-depth-2" type="text" name="Search" placeholder="Cari ..." data-search="template-list">
        <ul class="search-list collection display-none"></ul>
      </div> --}}
    
      <ul class="navbar-list right">
        {{-- <li class="hide-on-large-only search-input-wrapper"><a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);"><i class="material-icons">search</i></a></li> --}}
        {{-- <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown"><i class="material-icons">notifications_none<small class="notification-badge">5</small></i></a></li> --}}
        <li>
          <a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown">
            {{-- <span class="avatar-status avatar-online"><img src="{{ asset('assets/images/avatar/avatar-pria.jpg') }}" alt="avatar"><i></i></span> --}}
            <span style="font-weight: bold">{{ Auth::user()->name }}</span>            
          </a>
        </li>
        <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a></li>
      </ul>


      <!-- profile-dropdown-->
      <ul class="dropdown-content" id="profile-dropdown">
        <li><span class="grey-text text-darken-1 center">
          @if( Auth::user()->role == 'admin')
            <small>Role</small> <b>Administrator</b>
          @else
          <small>Role</small> <b>Tamu</b>
          @endif
        </span></li>
        <li class="divider"></li>
        <li><a class="grey-text text-darken-1" href=""><i class="material-icons">person_outline</i> Profil</a></li>
        <li><a class="grey-text text-darken-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">keyboard_tab</i> Keluar</a></li>
        <form action="
        {{ route('logout') }}" id="logout-form" method="post">
          @csrf
        </form>
      </ul>
    </div>
    
  </nav>
</div>