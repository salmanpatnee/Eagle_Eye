@extends('layouts.app')
@section('sidebar-menu-items')
    @include('4-Process.assets._partials.sidebar')
@endsection
@section('content')
    @yield('content')
@endsection
