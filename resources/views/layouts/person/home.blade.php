@extends('main')
@section('title', 'home')
@section('styles')
@include('includes.menu')
@endsection
@section('content')
@if(Auth::check())
<a href="{{ url('logout') }}">Logout</a>
|
{{ Auth::user()->rol_id }}
{{ session()->get('Rol') }}
@endif
{{-- @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach --}}
@endsection