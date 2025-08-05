@extends('layouts.app')
@section('sidebar-menu-items')
    @include('partials.sidebar-menus.cms')
@endsection
@section('content')
    @yield('content')
@endsection
