{{-- Retrive skeleton --}}
@extends('layouts.skeleton')

{{-- Retrive styles from page and send to skeleton --}}
@section('styles')
  @yield('styles')   
@endsection

{{-- Send custom body to skeleton --}}
@section('custom-body')
    <body>
@endsection

{{-- Include modules home page and send main to skeleton --}}
@section('app')

  <header>
    @include('partials.home.header')
  </header>

  <main>
    @include('partials.home.main')
  </main>

  <footer class="page-footer">
    @include('partials.home.footer')
  </footer>

@endsection

{{-- Retrive from page and send script to skeleton --}}
@section('scripts')
  @yield('scripts')   
@endsection