@extends('layouts.app')
@section('sidebar-menu-items')
    @include('partials.sidebar-menus.users')
    @include('partials.sidebar-menus.hr-experts')
    
@endsection
@section('content')
    @yield('content')
@endsection
