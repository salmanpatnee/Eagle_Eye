@extends('layouts.app')
@section('sidebar-menu-items')
    @include('partials.sidebar-menus.controls')
@endsection
@section('content')
    @yield('content')
@endsection
