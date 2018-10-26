@extends('main')
@section('title', 'Register Job')
@section('content')
@include('includes.menu')
@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection
@section('scriptShow')
  $(document).ready(function() {
    $('.js-example-basic-single').select2({
      placeholder:'Seleccione una opcion',
      width:'15%',
      allowClear: true
    });
});
@endsection
@section('styles')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
<form method="post">
  <select  name="" class="js-example-basic-single" multiple>
    <optgroup label="sd">
      <option value="wewe">r</option>
    </optgroup>
    <optgroup label="dd">
      <option value="">P</option>
      <option value="">S</option>
      <option value="">T</option>
    </optgroup>]

  </select>
</form>

@endsection
