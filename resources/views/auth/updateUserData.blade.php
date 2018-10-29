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
    <form method="POST" autocomplete="off" name="formUpdate">  
    {{ csrf_field() }}                    
      <div class="row mx-0 px-2">
        <div class="input-group mb-2 col-lg-12 px-1">
              <div class="input-group-prepend">
                <div class="input-group-text input-icon-easy">
                  <i class="lnr lnr-license"></i>
                </div>
              </div>
              <input type="number" placeholder="Identificacion" class="form-control form-control-lg input-easy" name="dni" value="{{ Auth::user()->dni }}" min="10">
        </div>
        <div class="input-group mb-2 col-lg-12 px-1">
              <div class="input-group-prepend">
                <div class="input-group-text input-icon-easy">
                  <i class="lnr lnr-user"></i>
                </div>
              </div>
              <input type="text" placeholder="Nombre" class="form-control form-control-lg input-easy" name="fsname" value="{{ Auth::user()->fsname }}" required>                                                       
        </div>      
        <div class="input-group mb-2 col-lg-6 col-sm-12 px-1 col-md-6">
              <div class="input-group-prepend">
                <div class="input-group-text input-icon-easy">
                  <i class="lnr lnr-envelope"></i>
                </div>
              </div>
              <input type="email" placeholder="E-Mail" class="form-control form-control-lg input-easy" name="email" value="{{ Auth::user()->email }}" required>
        </div>
        <div class="input-group mb-2 col-lg-6 col-sm-12 px-1 col-md-6">
              <div class="input-group-prepend">
                <div class="input-group-text input-icon-easy">
                  <i class="lnr lnr-smartphone"></i>
                </div>
              </div>
              <input type="number" placeholder="Telefono" class="form-control form-control-lg input-easy" name="phone" value="{{ Auth::user()->phone }}" required>
        </div>
        @if(!App\Http\Controllers\UserController::isSocial())
          <div class="input-group mb-2 col-lg-6 col-md-6 col-sm-12 px-1" data-placement="top" data-toggle="tooltip" title="Click para editar la contraseña">
                <div class="input-group-prepend">
                  <div class="input-group-text input-icon-easy">
                    <i class="lnr lnr-lock"></i>
                  </div>
                </div>
                <input type="password" placeholder="Nueva Contraseña" class="form-control form-control-lg input-easy disabled" name="password" required>
          </div>
          <div class="input-group mb-2 col-lg-6 col-md-6 col-sm-12 px-1">
                <div class="input-group-prepend">
                  <div class="input-group-text input-icon-easy">
                    <i class="lnr lnr-lock"></i>
                  </div>
                </div>
                <input type="password" placeholder="Antigua Contraseña" class="form-control form-control-lg input-easy disabled" name="password_confirmation" required>
          </div>
        @endif
      </div>
    </form>
</div>
