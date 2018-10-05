@extends('main')
@section('title', 'Login')
@section('content')
<div class="section">
	<div class="row row__wrapper mx-0">
		<div class="col-lg-4 col-md-6 col-sm-12 auth__wrapper bg-white px-5 py-5">
			<div class="middle">
				<p class="text-center position-relative">
					<img src="{{ asset('src/logo/logoShort.png') }}" class="logoShort">
					<span style="font-size: 30px;" class="dosis font-weight-bold">EasyJobs</span>
				</p>
				<hr>
				<errors class="quick" style="display: none;zoom: .75;">
					<div class="card py-2 px-3 bg-danger text-white mb-2 mt-2">
						<h5 class="mb-1 card-title relaway"><i class="fa fa-exclamation-triangle"></i> Errores</h5>
						<div class="card-body px-1 py-1">
							
						</div>
					</div>
				</errors>
				<div class="form__wrapper">
					<form autocomplete="off" name="login">						
						<div class="input-group mb-2">
					        <div class="input-group-prepend">
					          <div class="input-group-text input-icon-easy">
					          	<i class="lnr lnr-user"></i>
					          </div>
					        </div>
					        <input type="number" name="dni" class="validEmpty form-control form-control-lg input-easy" placeholder="Identificacion">
				      </div>
				      <div class="input-group mb-2">
					        <div class="input-group-prepend">
					          <div class="input-group-text input-icon-easy">
					          	<i class="lnr lnr-lock"></i>
					          </div>
					        </div>
					        <input type="password" class="validEmpty form-control form-control-lg input-easy" name="pass" placeholder="Contraseña">
				      </div>
				      <div class="custom-control custom-checkbox mb-3">
					  	<input type="checkbox" class="custom-control-input" name="remember" value="1" id="remember">
					  	<label class="custom-control-label" for="remember">Recordarme</label>
					  </div>
				      <p>
				      	<button type="button" name="submitAuth" class="btn btn-primary btn-block">Ingresar <i class="fa fa-sign-in-alt mr-1"></i></button>
				      </p>
				      <p class="grey-text text-right relaway">
				    	No estas registrado? 
				        <a href="{{ url('register') }}" class="font-weight-bold btn btn-sm btn-outline-info ml-2">
				        	<span class="info-text">
				        		Registrate
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