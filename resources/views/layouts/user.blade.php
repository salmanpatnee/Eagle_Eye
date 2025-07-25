@extends('layouts.app')
@section('sidebar-menu-items')
    @include('partials.sidebar-menus.users')
@endsection
@section('content')
    @yield('content')
@endsection
