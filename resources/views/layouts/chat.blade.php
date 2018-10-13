@extends('main')
@section('title', 'chat')
@section('content')
<div class="section mt-3 px-3 pb-3">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Nickname" name="nick">
      <input type="text" class="form-control w-50" placeholder="Message" name="message">
      <div class="input-group-append" id="button-addon4">       
        <button class="btn btn-outline-secondary" name="submitMessage">Enviar</button>
        <button class="btn btn-outline-secondary" name="submitGEO">Enviar Geolocalizacion</button>
      </div>
    </div>
</div>
<hr>
<div class="section" id="cont">
    
</div>
@endsection
@section('script')

@endsection