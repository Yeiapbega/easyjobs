@extends('main')
@section('title', 'home')
@section('content')
@if(Auth::check())
	<a href="{{ url('logout') }}">Logout</a>
	|
	{{ Auth::user()->rol_id }}
	{{-- {!! dd(Auth::user()->toArray()) !!} --}}
	{{ session()->get('Rol') }}
	{{ session()->get('remember') }}
@endif
@endsection