@extends('layouts.app')
@section('sidebar-menu-items')
    <x-sidebar-menu-item route_name="risk-appetites.index" label_ar="الرغبة في المخاطرة" label="Risk Appetite" />
    <x-sidebar-menu-item route_name="risk-inherent.index" label_ar="المخاطر الكامنة" label="Risk Inherent" />
@endsection
@section('content')
    @yield('content')
@endsection
