{{-- Retrive skeleton --}}
@extends('layouts.skeleton')

{{-- Retrive styles from page and send to skeleton --}}
@section('styles')
  @yield('styles')   
@endsection

{{-- Send custom body to skeleton --}}
@section('custom-body')
    <body style="background-image: url({{ asset('assets/images/background/auth-bg.jpg') }});">
@endsection

{{-- Retrive content from page and send main to skeleton --}}
@section('app')
  <main>
    @yield('content')
  </main>
@endsection

{{-- Retrive from page and send script to skeleton --}}
@section('scripts')
  @yield('scripts')   
@endsection