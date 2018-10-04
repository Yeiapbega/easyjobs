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
				<div class="form__wrapper">
					<form autocomplete="off">
						<div class="input-group mb-2">
					        <div class="input-group-prepend">
					          <div class="input-group-text input-icon-easy">
					          	<span class="lnr lnr-user"></span>
					          </div>
					        </div>
					        <input type="text" class="form-control form-control-lg input-easy" id="inlineFormInputGroup" placeholder="Username">
				      </div>
				      <div class="input-group mb-3">
					        <div class="input-group-prepend">
					          <div class="input-group-text input-icon-easy">
					          	<span class="lnr lnr-lock"></span>
					          </div>
					        </div>
					        <input type="text" class="form-control form-control-lg input-easy" id="inlineFormInputGroup" placeholder="Password">
				      </div>
				      <p>
				      	<button type="button" class="btn btn-primary btn-block">Ingresar <span class="lnr lnr-enter"></span></button>
				      </p>
				      <p class="grey-text text-right relaway">
				    	No estas registrado? 
				        <a href="{{ url('registro') }}" class="font-weight-bold btn btn-sm btn-outline-info ml-2">
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