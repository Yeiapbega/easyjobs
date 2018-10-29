@extends('main')
@section('title', 'Login')
@section('styles')
<style type="text/css">
#main-contain
{
  padding-top: 0px;
}
</style>
@endsection
@section('content')
@include('includes.menu')
<div class="section">
	<div class="row row__wrapper mx-0">
		<div class="col-lg-5 animated fadeInLeft col-md-6 col-sm-12 auth__wrapper bg-white px-5 py-5">
			<div class="middle">
				<p class="text-center position-relative mb-0">
					<img src="{{ asset('src/logo/logoShort.png') }}" class="logoShort">
					<span style="font-size: 25px;" class="dosis font-weight-bold">EasyJobs</span> •
					<span style="font-size: 22px;" class="quick">Login</span>
				</p>
				<hr>
				<p class="d-flex justify-content-center">
                    <button class="btn btn-outline-danger btn_handlerC mx-3" handler="google"><i class="fa fa-google-plus"></i> Google</button>
                    <strong class="pt-1">ó</strong>
                    <button class="btn btn-outline-info btn_handlerC mx-3" handler="facebook"><i class="fa fa-facebook-square"></i> Facebook</button>
                </p>
                <hr>
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
				      	<button type="button" name="submitAuth" class="btn btn-primary btn-block">Ingresar <i class="fa fa-sign-in mr-1"></i></button>
				      </p>
				      <p class="grey-text text-right relaway">
				    	No estas registrado?
				        <a href="{{ url('register') }}" class="font-weight-bold btn btn-sm btn-outline-info ml-2">
				        	<span class="info-text">
				        		Registrate
				        	</span>
				        </a>
				    </p>				    
			    	<ul class="icon__social px-0 mb-0 text-center d-lg-none d-md-none" style="list-style: none;">
						<li>
							<a href="#!" data-toggle="tooltip" data-placement="bottom" title="Escribenos en Facebook!"><i class="fa fa-facebook-square"></i></a>
							<a href="#!"><i class="fa fa-instagram" data-toggle="tooltip" data-placement="bottom" title="Siguenos en Instagram!"></i></a>
							<a href="#!"><i class="fa fa-youtube-play" data-toggle="tooltip" data-placement="bottom" title="Miranos en YouTube!"></i></a>
						</li>
					</ul>				    
					</form>
				</div>
			</div>
		</div>		
		@include('includes.authRegister')		
	</div>
</div>
@endsection
@section('scriptShow')
<script type="text/javascript">
    $("body").attr("id", "body");
    $("body").addClass("my-0 mx-0");
    particlesJS.load('body','{{ asset('js/particles.cfg.json') }}');    
</script>
@endsection