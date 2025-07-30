@extends('layouts.app')
@section('sidebar-menu-items')
    @include('partials.sidebar-menus.risk-acceptances')
@endsection
@section('content')
    @yield('content')
@endsection
