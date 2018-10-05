@extends('main')
@section('title', 'home')
@section('content')
<a href="{{ url('login') }}">Login</a>
|
<a href="{{ url('register') }}">Register</a>
@endsection
