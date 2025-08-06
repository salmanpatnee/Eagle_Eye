@extends('layouts.app')
@section('sidebar-menu-items')
    @include('process/initial-setup/_partials/sidebar')
@endsection
@section('content')
    @yield('content')
@endsection
