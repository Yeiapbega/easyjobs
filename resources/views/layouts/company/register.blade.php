{{-- @extends('main')
@section('title', 'Register Job')
@section('content')
@include('includes.menu') --}}
@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/i18n/es.js"></script>
@endsection
@section('scriptShow')
<script type="text/javascript">
$(document).ready(function() {
  $.fn.select2.defaults.set('language', 'es');
  $('.js-example-basic-single').select2({
    placeholder:'Seleccione una opcion',
    width:'100%',
    allowClear: true,
    maximumSelectionLength: 3,
    // language: "es"
  });
});
</script>
@endsection
@section('styles')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
<form method="post">
  <select  name="este" class="js-example-basic-single" multiple>
    <optgroup label="Desarrollo">
      <option value="wewe">aplicacion web</option>
      <option value="wewe">pagina web</option>
    </optgroup>
    <optgroup label="dd">
      <option value="P">P</option>
      <option value="S">S</option>
      <option value="GT">T</option>
    </optgroup>

  </select>
</form>

{{-- @endsection --}}
