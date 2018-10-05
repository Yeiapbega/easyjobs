@extends('main')
@section('title', 'home')
@section('content')
@if(Auth::check())
<a href="{{ url('logout') }}">Logout</a>
|
{{ Auth::user()->rol_id }}
{{ session()->get('Rol') }}
{{ session()->get('remember') }}
@endif
cp
{{-- @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach --}}
@endsection