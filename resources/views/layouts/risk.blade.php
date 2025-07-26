@extends('layouts.app')
@section('sidebar-menu-items')
    @include('partials.sidebar-menus.risks')
@endsection
@section('content')
    @yield('content')
@endsection
