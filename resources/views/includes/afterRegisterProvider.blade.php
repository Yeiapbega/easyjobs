@extends('main')
@section('content')
<div class="input-group mb-2">
    <select class="select w-100" name="rol" id="rol">
        <option selected disabled>Planeas Usar La Plataforma Para</option>
        <option value="2">Contratar</option>
        <option value="3">Ser Contratado</option>
        <option value="4">Ambos</option>
    </select>
</div>
@endsection