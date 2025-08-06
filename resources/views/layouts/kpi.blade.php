@extends('layouts.app')
@section('sidebar-menu-items')
    @include('partials.sidebar-menus.kpis')
@endsection
@section('content')
    @yield('content')
@endsection
