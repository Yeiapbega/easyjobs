<errors class="quick" style="display: none;zoom: .75;cursor: pointer;">
    <div class="card py-2 px-3 bg-danger text-white mb-3 mt-2">
        <h5 class="mb-1 card-title relaway"><i class="fa fa-exclamation-triangle"></i> 
            Errores
            <i class="fa fa-times close-errors float-right"></i>
        </h5>
        <div class="card-body px-1 py-1">
            
        </div>
    </div>
</errors>
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
                Elige las etiquetas!
              </p>
              {!! App\Http\Controllers\TagController::selectTags('tags[]') !!}
        </div>            
        <div class="mb-2 col-lg-6 col-sm-12 px-1 col-md-6">    
          <p class="mb-0">
            Cuantas horas dura?
          </p>          
              <div class="input-group">
                <span class="input-number-increment bold"><i class="lnr lnr-circle-minus"></i></span>                
                <input class="form-control px-2 input-number input-easy" name="hours" type="text" value="1" min="1" max="23" data-placement="top" data-toggle="tooltip" data-html="true" title="<b>INFO</b><br><small class='pb-2 text-center'>Para colocar dias solo pon el numero precedido de la letra 'D' (1D)  </small>"> 
                <span class="input-number-decrement bold"><i class="lnr lnr-plus-circle"></i></span>
              </div>
        </div>
        <div class="mb-2 col-lg-6 col-sm-12 px-1 col-md-6"> 
          <p class="mb-0">
            Cuanto pagaras por hora?
          </p>  
            <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text input-icon-easy">
                      <i class="lnr lnr-database"></i>
                    </div>
                  </div>
                  <input type="number" placeholder="Ingresa la cantidad" class="form-control form-control-lg input-easy" name="pay">
            </div>
        </div>
        <div class="mb-2 col-lg-12 col-sm-12 px-1 col-md-12"> 
          <p class="mb-0">
            Describe tu <strong>EasyJobs</strong> !
          </p>
        </div> 
        <div class="input-group mb-2 col-lg-12 col-md-12 col-sm-12 px-1">
              <textarea name="description" id="textJob" class="input-easy">
                
              </textarea>
        </div>
        <style type="text/css">
          .ck.ck-editor 
          {
            width: 100%;
          }
          .ck-rounded-corners .ck.ck-editor__top .ck-sticky-panel .ck-toolbar, .ck.ck-editor__top .ck-sticky-panel .ck-toolbar.ck-rounded-corners
          {
            border-radius: .25em .25em 0px 0px;
          }

          .ck.ck-editor__editable_inline p 
          {
            margin-top: 0;
            margin-bottom: .1rem !important;
          }

          .ck.ck-editor__editable_inline>:first-child
          {
            margin-top: .1rem !important;
            margin-bottom: .1rem !important;
          }

          .ck.ck-editor__editable_inline>:last-child
          {
            margin-bottom: 1rem !important;
          }

          .ck.ck-editor__main>.ck-editor__editable
          {
            padding: 10px 10px 0px 10px;
          }
        </style>
      </div>
    </form>
</div>
{{-- <script type="text/javascript" src="{{ asset('src/js/es.js') }}"></script> --}}
<script type="text/javascript">
$(document).ready(function() {
  $.fn.select2.defaults.set('language', 'es');
  $('.js-example-basic-single').select2({
    placeholder:'Eligeme',
    width:'100%',
    allowClear: true,
    maximumSelectionLength: 5,    
  });
});
</script>