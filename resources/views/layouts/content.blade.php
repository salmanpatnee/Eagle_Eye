@extends('layouts.app')
@section('sidebar-menu-items')
    @include('partials.sidebar-menus.content')
@endsection
@section('content')
    @yield('content')
@endsection
