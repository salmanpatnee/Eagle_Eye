@extends('layouts.app')
@section('sidebar-menu-items')
    @include('partials.sidebar-menus.assets')
@endsection
@section('content')
    @yield('content')
@endsection
