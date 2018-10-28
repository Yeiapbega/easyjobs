<div class="form__wrapper">
    <form method="POST" autocomplete="off" name="newJob">  
    {{ csrf_field() }}                   
      <div class="row mx-0 px-2">
        <div class="input-group mb-2 col-lg-12 px-1">
              <div class="input-group-prepend">
                <div class="input-group-text input-icon-easy">
                  <i class="lnr lnr-pencil"></i>
                </div>
              </div>
              <input type="text" placeholder="Titulo" class="form-control form-control-lg input-easy" name="title">
        </div>
        <div class="input-group mb-2 col-lg-12 px-1 d-flex">
              <p class="mb-1">
                Elige las etiquetas para tu <strong>EasyJobs</strong>!
              </p>
              {!! App\Http\Controllers\TagController::selectTags('hours') !!}
        </div> 
        <div class="mb-2 col-lg-12 col-sm-12 px-1 col-md-12"> 
          <p class="mb-0">
            Cuantas horas dura tu <strong>EasyJobs</strong> !
          </p>
        </div>             
        <div class="mb-2 col-lg-6 col-sm-12 px-1 col-md-6" data-placement="top" data-toggle="tooltip" data-html="true" title="<b>INFO</b><br><small class='pb-2 text-center'>Para colocar dias solo pon el numero precedido de la letra 'D' (1D)  </small>">              
              <div class="input-group">
                <span class="input-number-decrement"><i class="lnr lnr-plus-circle"></i></span>
                <input class="form-control input-number" type="text" value="1">
              <span class="input-number-increment"><i class="lnr lnr-circle-minus"></i></span>
              </div>
        </div>
        <div class="input-group mb-2 col-lg-6 col-sm-12 px-1 col-md-6">
              <div class="input-group-prepend">
                <div class="input-group-text input-icon-easy">
                  <i class="lnr lnr-smartphone"></i>
                </div>
              </div>
              <input type="number" placeholder="Telefono" class="form-control form-control-lg input-easy" name="phone" required>
        </div>
        <div class="input-group mb-2 col-lg-6 col-md-6 col-sm-12 px-1">
              <div class="input-group-prepend">
                <div class="input-group-text input-icon-easy">
                  <i class="lnr lnr-lock"></i>
                </div>
              </div>
              <input type="password" placeholder="Contraseña" class="form-control form-control-lg input-easy" name="password"  required>
        </div>
        <div class="input-group mb-2 col-lg-6 col-md-6 col-sm-12 px-1">
              <div class="input-group-prepend">
                <div class="input-group-text input-icon-easy">
                  <i class="lnr lnr-lock"></i>
                </div>
              </div>
              <input type="password" placeholder="Confirmar Contraseña" class="form-control form-control-lg input-easy" name="password_confirmation" required>
        </div>
      </div>
    </form>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $.fn.select2.defaults.set('language', 'es');
  $('.js-example-basic-single').select2({
    placeholder:'Eligeme',
    width:'100%',
    allowClear: true,
    maximumSelectionLength: 3,
    // language: "es"
  });
});
</script>