<div class="form__wrapper">
    <form method="POST" autocomplete="off" name="formUpdate">                      
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
$('.input-easy').focus(function()
{    
    let icon = $(this).parent().find('.input-icon-easy');    
    icon.css({'border-color':'#80bdff'}).find('i').css({'font-weight':'bold', 'color':'#80bdff'})
}).focusout(function()
{
    let icon = $(this).parent().find('.input-icon-easy');
    icon.css({'border-color':'#ced4da'}).find('i').css({'font-weight':'normal', 'color':'#495057'})    
})
