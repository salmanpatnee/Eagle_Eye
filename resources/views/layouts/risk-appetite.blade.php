@extends('layouts.app')
@section('sidebar-menu-items')
    @include('partials.sidebar-menus.risk-appetites')
@endsection
@section('content')
    @yield('content')
@endsection
