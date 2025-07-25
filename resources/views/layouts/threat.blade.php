@extends('layouts.app')
@section('sidebar-menu-items')
    @include('partials.sidebar-menus.threats')
@endsection
@section('content')
    @yield('content')
@endsection
