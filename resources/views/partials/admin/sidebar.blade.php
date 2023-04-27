<div class="brand-sidebar">
  <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="{{ url('/') }}"><img class="hide-on-med-and-down" src="{{ asset('assets/images/logo/logo-kmnu(210x140).jpg') }}" alt="Logo KMNU"/><img class="show-on-medium-and-down hide-on-med-and-up" src="{{ asset('assets/images/logo/logo-kmnu(210x140).jpg') }}" alt="materialize logo"/><span class="logo-text hide-on-med-and-down"> SP Tajwid</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
</div>
<ul class="sidenav leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
  
  {{-- @can('role',['administrator', 'admin-pt', 'admin-reg'])
    <li class="active bold"><a class="{{ Route::is(Auth::user()->role) ? 'active' : '' }} waves-effect waves-cyan" href="{{ route(Auth::user()->role) }}"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a></li>
  @endcan --}}
  
  @can('role',['admin'])
  
  <li class="bold"><a class="{{ Route::is('dashboard.*') ? 'actived' : '' }} waves-effect waves-cyan mt-5" href="{{ route('dashboard.index') }}"><i class="material-icons">dashboard</i><span class="menu-title" data-i18n="User Profile">Dashboard</span></a>
  <li class="bold"><a class="{{ Route::is('data-user.*') ? 'actived' : '' }} waves-effect waves-cyan" href="{{ route('data-user.index') }}"><i class="material-icons">person</i><span class="menu-title">Data User</span></a>
  
  <li class="navigation-header"><a class="navigation-header-text">Basis Pengetahuan</a><i class="navigation-header-icon material-icons">more_horiz</i>

  <li class="bold"><a class="{{ Route::is('nama-tajwid.*') ? 'actived' : '' }} waves-effect waves-cyan" href="{{ route('nama-tajwid.index') }}"><i class="material-icons">list</i><span class="menu-title">Nama Tajwid</span></a> 
  <li class="bold"><a class="{{ Route::is('tanda-tajwid.*') ? 'actived' : '' }} waves-effect waves-cyan" href="{{ route('tanda-tajwid.index') }}"><i class="material-icons dp48">new_releases</i><span class="menu-title">Tanda Tajwid</span></a>
  <li class="bold"><a class="{{ Route::is('role-base.*') ? 'actived' : '' }} waves-effect waves-cyan" href="{{ route('role-base.index') }}"><i class="material-icons dp48">code</i><span class="menu-title">Role Base</span></a>  
  <li class="bold"><a class="{{ Route::is('tajwid.*') ? 'actived' : '' }} waves-effect waves-cyan" href="{{ route('tajwid.index') }}"><i class="material-icons">apps</i><span class="menu-title">Kelola Tajwid</span></a> 

  @endcan
</ul>

{{-- active on mobile version. Dont delete this! --}}
<div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>