@extends('layouts.app')
@section('sidebar-menu-items')
    @include('partials.sidebar-menus.evidences')
@endsection
@section('content')
    @yield('content')
@endsection
