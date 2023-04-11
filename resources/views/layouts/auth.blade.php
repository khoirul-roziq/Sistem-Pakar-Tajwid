@extends('layouts.skeleton')

@section('styles')
  @yield('styles')   
@endsection

{{-- Send custom body to skeleton --}}
@section('custom-body')
    <body style="background-image: url({{ asset('assets/images/background/islamic-new-year-concept-with-copy-space.jpg') }});" class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns" data-open="click" data-menu="vertical-modern-menu" data-col="2-columns" onload = "autoClick();">
@endsection

@section('app')

  <div id="main">
    @yield('content')
  </div>

  <footer class="page-footer footer footer-static footer-dark gradient-45deg-indigo-purple gradient-shadow navbar-border navbar-shadow">
    @include('partials.footer')
  </footer>
@endsection

@section('scripts')
  @yield('scripts')   
@endsection