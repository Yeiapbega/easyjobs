@extends('main')
@section('title', 'Register')
@section('content')
<div class="section">
    <div class="row row__wrapper mx-0">        
        <div class="col-lg-4 col-md-6 animated fadeInLeft col-sm-12 auth__wrapper bg-white px-5 pt-5 pb-4">
            <errors class="quick" style="display: none;zoom: .75;cursor: pointer;">
                <div class="card py-2 px-3 bg-danger text-white mb-3 mt-2">
                    <h5 class="mb-1 card-title relaway"><i class="fa fa-exclamation-triangle"></i> Errores</h5>
                    <div class="card-body px-1 py-1">
                        
                    </div>
                </div>
            </errors>
            <div class="middle" style="top: 0;">
                <p class="text-center position-relative mb-0">
                    <img src="{{ asset('src/logo/logoShort.png') }}" class="logoShort">
                    <span style="font-size: 25px;" class="dosis font-weight-bold">EasyJobs</span> • 
                    <span style="font-size: 22px;" class="quick">Register</span>
                </p>
                <hr>
                <div class="form__wrapper">
                    <form method="POST" autocomplete="off" name="formReg">                      
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text input-icon-easy">
                                <i class="lnr lnr-user"></i>
                              </div>
                            </div>
                            <input type="number" placeholder="Identificacion" class="form-control form-control-lg input-easy" name="dni" value="{{ old('dni') }}" min="10">
                      </div>
                      <div class="input-group mb-2">
                            <input type="text" placeholder="Nombre" class="border-left pl-2 form-control form-control-lg input-easy" name="name" value="{{ old('name') }}" required>                           
                            <input type="text" placeholder="Segundo Nombre" class="border-left pl-2 form-control form-control-lg input-easy" name="sname" value="{{ old('sname') }}" required>
                      </div>
                      <div class="input-group mb-2">
                            <input type="text" placeholder="Apellido" class="border-left pl-2 form-control form-control-lg input-easy" name="flname" value="{{ old('flname') }}" required>
                             <input type="text" placeholder="Segundo Apellido" class="border-left pl-2 form-control form-control-lg input-easy" name="slname" value="{{ old('slname') }}" required>
                      </div>
                      <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text input-icon-easy">
                                <i class="lnr lnr-lock"></i>
                              </div>
                            </div>
                            <input type="email" placeholder="E-Mail" class="form-control form-control-lg input-easy" name="email" value="{{ old('email') }}" required>
                      </div>
                      <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text input-icon-easy">
                                <i class="lnr lnr-lock"></i>
                              </div>
                            </div>
                            <input type="number" placeholder="Telefono" class="form-control form-control-lg input-easy" name="phone" value="{{ old('phone') }}" required>
                      </div>
                      <div class="input-group mb-2">
                            <select class="select w-100" name="rol" id="rol">
                                <option selected disabled>Planeas Usar La Plataforma Para</option>
                                <option value="2">Contratar</option>
                                <option value="3">Ser Contratado</option>
                                <option value="4">Ambos</option>
                            </select>
                      </div>
                      <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text input-icon-easy">
                                <i class="lnr lnr-lock"></i>
                              </div>
                            </div>
                            <input type="password" placeholder="Contraseña" class="form-control form-control-lg input-easy" name="password"  required>
                      </div>
                      <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text input-icon-easy">
                                <i class="lnr lnr-lock"></i>
                              </div>
                            </div>
                            <input type="password" placeholder="Confirmar Contraseña" class="form-control form-control-lg input-easy" name="password_confirmation" required>
                      </div>
                      <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" class="custom-control-input" name="tyc" id="tyc">
                        <label class="custom-control-label" for="tyc">Aceptas los <a href="#!" class="font-weight-bold">Terminos y Condiciones</a></label>
                      </div>
                      <p>
                        <button type="button" name="submReg" class="btn btn-primary btn-block">Registrar <i class="fa fa-paper-plane ml-1"></i></button>
                      </p>
                      <p class="grey-text text-right">
                        Ya estas registrado? 
                        <a href="{{ url('login') }}" class="font-weight-bold btn btn-sm btn-outline-info ml-2">
                            <span class="info-text">
                                Ingresa
                            </span>
                        </a>
                    </p>
                    </form>
                </div>
            </div>
        </div>
        <div class="overlay-bg overlay"></div>
    </div>
</div>

@endsection
