<div class="brand-sidebar">
  <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="{{ url('/home') }}"><img class="hide-on-med-and-down" src="{{ asset('assets/images/logo/Al-Qur\'an_logo.jpg') }}" alt="materialize logo"/><span class="logo-text hide-on-med-and-down"> SP Tajwid</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
</div>
<ul class="sidenav leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
  
  @can('role',['admin'])
  
  <li class="bold"><a class="{{ Route::is('dashboard.*') ? 'actived' : '' }} waves-effect waves-cyan mt-5" href="{{ route('dashboard.index') }}"><i class="material-icons">dashboard</i><span class="menu-title" data-i18n="User Profile">Dashboard</span></a>
  <li class="bold"><a class="{{ Route::is('data-user.*') ? 'actived' : '' }} waves-effect waves-cyan" href="{{ route('data-user.index') }}"><i class="material-icons">people</i><span class="menu-title">Pengguna</span></a>
  
  <li class="navigation-header"><a class="navigation-header-text">Rule Tajwid</a><i class="navigation-header-icon material-icons">more_horiz</i>

  <li class="bold"><a class="{{ Route::is('tajwid.*') ? 'actived' : '' }} waves-effect waves-cyan" href="{{ route('tajwid.index') }}"><i class="material-icons">apps</i><span class="menu-title">Tajwid</span></a> 
  <li class="bold"><a class="{{ Route::is('tanda-tajwid.*') ? 'actived' : '' }} waves-effect waves-cyan" href="{{ route('tanda-tajwid.index') }}"><i class="material-icons dp48">new_releases</i><span class="menu-title">Huruf/ Tanda</span></a>
  <li class="bold"><a class="{{ Route::is('role-base.*') ? 'actived' : '' }} waves-effect waves-cyan" href="{{ route('role-base.index') }}"><i class="material-icons dp48">functions</i><span class="menu-title">Rule Tajwid</span></a>  
    <li class="bold"><a class="{{ Route::is('kategori.*') ? 'actived' : '' }} waves-effect waves-cyan" href="{{ route('kategori.index') }}"><i class="material-icons dp48">list</i><span class="menu-title">Kategori</span></a>  

  <li class="navigation-header"><a class="navigation-header-text">Kelola Konsultasi</a><i class="navigation-header-icon material-icons">more_horiz</i>
  <li class="bold"><a class="{{ Route::is('pertanyaan.*') ? 'actived' : '' }} waves-effect waves-cyan" href="{{ route('pertanyaan.index') }}"><i class="material-icons dp48">help</i><span class="menu-title">Pertanyaan</span></a> 

  @endcan

  @can('role',['admin','guest'])
  <li class="navigation-header"><a class="navigation-header-text">Konsultasi</a><i class="navigation-header-icon material-icons">more_horiz</i>
  <li class="bold"><a class="{{ Route::is('konsultasi.*') ? 'actived' : '' }} waves-effect waves-cyan" href="{{ route('konsultasi') }}"><i class="material-icons dp48">chat</i><span class="menu-title">Konsultasi</span></a>  
  @endcan
</ul>

{{-- active on mobile version. Dont delete this! --}}
<div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only white" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>