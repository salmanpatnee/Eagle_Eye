@extends('layouts.app')
@section('sidebar-menu-items')
    @include('partials.sidebar-menus.asset-groups')
@endsection
@section('content')
    @yield('content')
@endsection
