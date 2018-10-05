@extends('main')
@section('title', 'home')
@section('content')
<a href="{{ url('login') }}">Login</a>
|
<a href="{{ url('register') }}">Register</a>
@if(Auth::check())
|
<a href="{{ url('register') }}">Logout</a>
|
{{ Auth::user()->rol_id }}
@endif
@endsection
