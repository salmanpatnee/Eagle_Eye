@extends('layouts.app')
@section('sidebar-menu-items')
    @include('process.1-InitialSetup._partials.sidebar')
@endsection
@section('content')
    @yield('content')
@endsection
