@extends('layouts.app')
@section('sidebar-menu-items')
    @include('process.initial-setup._partials.import-manager')
@endsection
@section('content')
    @yield('content')
@endsection
