@extends('layouts.app')
@section('sidebar-menu-items')
    @include('partials.sidebar-menus.artifacts')
@endsection
@section('content')
    @yield('content')
@endsection
