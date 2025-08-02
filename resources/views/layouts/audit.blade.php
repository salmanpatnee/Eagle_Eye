@extends('layouts.app')
@section('sidebar-menu-items')
    @include('partials.sidebar-menus.audits')
@endsection
@section('content')
    @yield('content')
@endsection
