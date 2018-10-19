@extends('main')
@section('title', 'home')
@section('styles')
@include('includes.menu')
<style type="text/css">
.particles-js-canvas-el
{
	width: 100% !important;
	position: absolute;
	left: 0;
	z-index: 0;
	right: 0;
	top: 50%;
	transform: translateY(-50%);
}
#main-contain
{
  padding-top: 0px;
}
</style>
@endsection
@section('content')
<section class="banner-area relative" id="banner-area">	
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row fullscreen d-flex align-items-center justify-content-center" style="height: 100vh;">
			<div class="banner-content col-lg-12">
				{{-- <h1 class="text-white">
					<span>1500+</span> Jobs posted last week				
				</h1>	
				
				<p class="text-white"> <span>Search by tags:</span> Tecnology, Business, Consulting, IT Company, Design, Development</p> --}}
			</div>											
		</div>
	</div>
</section>
<section class="features-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 mb-2">
				<div class="single-feature">
					<h5 class="dosis">Busqueda</h5>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing.
					</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 mb-2">
				<div class="single-feature">
					<h5 class="dosis">Aplicación</h5>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing.
					</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="single-feature">
					<h5 class="dosis">Seguridad</h5>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing.
					</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="single-feature">
					<h5 class="dosis">Notificación</h5>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing.
					</p>
				</div>
			</div>																		
		</div>
	</div>	
</section>
<br>
<div class="container mt-3">
	{{-- <h1 class="font-weight-bold text-center p1-gradient-color relaway text-uppercase mt-1 mb-3">Trabajos Recientes</h1> --}}
	<div class="carusel-beta">
		<div class="single-testimonial item card rounded">							
			<div class="card-body">
				<h5 class="text-dark bold">
					<span class="lnr lnr-briefcase"></span> Job Tessting
				</h5>
				<hr class="mb-1">
				{{-- <img class="mx-auto" src="img/t2.png" alt=""> --}}
				<p class="desc-job text-justify mb-1">					
					Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
				</p>	
				{{-- <hr class="my-1"> --}}
				<ul class="info-job list-unstyled mb-0">
					{{-- @if(Auth::check()) --}}
						<li>
							<small>
								<span class="lnr lnr-smartphone"></span> 555-555-55-55
							</small>
						</li>
						<li>
							<small>
								<span class="lnr lnr-map-marker"></span> Cra. 7 #24-43 B/ adadas asdasdasd
							</small>
						</li>
					{{-- @endif --}}
					<li>
						<small>
							<span class="lnr lnr-tag"></span>
							<a href="#!"><span class="badge badge-dark">Diseño</span></a>
							<a href="#!"><span class="badge badge-dark">Arte</span></a>
							<a href="#!"><span class="badge badge-dark">Tecnologia</span></a>
						</small>
					</li>
				</ul>
				<p class="mb-0 text-right">
					<button class="btn-outline-primary btn"><span class="lnr lnr-heart"></span></button>
					<button class="btn-outline-primary btn">Aplicar</button>
				</p>			
			</div>
		</div>
		<div class="single-testimonial item card rounded">							
			<div class="card-body">
				<h5 class="text-dark bold">
					<span class="lnr lnr-briefcase"></span> Job Tessting
				</h5>
				<hr class="mb-1">
				{{-- <img class="mx-auto" src="img/t2.png" alt=""> --}}
				<p class="desc-job text-justify mb-1">					
					Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
				</p>	
				{{-- <hr class="my-1"> --}}
				<ul class="info-job list-unstyled mb-0">
					{{-- @if(Auth::check()) --}}
						<li>
							<small>
								<span class="lnr lnr-smartphone"></span> 555-555-55-55
							</small>
						</li>
						<li>
							<small>
								<span class="lnr lnr-map-marker"></span> Cra. 7 #24-43 B/ adadas asdasdasd
							</small>
						</li>
					{{-- @endif --}}
					<li>
						<small>
							<span class="lnr lnr-tag"></span>
							<a href="#!"><span class="badge badge-dark">Diseño</span></a>
							<a href="#!"><span class="badge badge-dark">Arte</span></a>
							<a href="#!"><span class="badge badge-dark">Tecnologia</span></a>
						</small>
					</li>
				</ul>
				<p class="mb-0 text-right">
					<button class="btn-outline-primary btn"><span class="lnr lnr-heart"></span></button>
					<button class="btn-outline-primary btn">Aplicar</button>
				</p>			
			</div>
		</div>
		<div class="single-testimonial item card rounded">							
			<div class="card-body">
				<h5 class="text-dark bold">
					<span class="lnr lnr-briefcase"></span> Job Tessting
				</h5>
				<hr class="mb-1">
				{{-- <img class="mx-auto" src="img/t2.png" alt=""> --}}
				<p class="desc-job text-justify mb-1">					
					Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
				</p>	
				{{-- <hr class="my-1"> --}}
				<ul class="info-job list-unstyled mb-0">
					{{-- @if(Auth::check()) --}}
						<li>
							<small>
								<span class="lnr lnr-smartphone"></span> 555-555-55-55
							</small>
						</li>
						<li>
							<small>
								<span class="lnr lnr-map-marker"></span> Cra. 7 #24-43 B/ adadas asdasdasd
							</small>
						</li>
					{{-- @endif --}}
					<li>
						<small>
							<span class="lnr lnr-tag"></span>
							<a href="#!"><span class="badge badge-dark">Diseño</span></a>
							<a href="#!"><span class="badge badge-dark">Arte</span></a>
							<a href="#!"><span class="badge badge-dark">Tecnologia</span></a>
						</small>
					</li>
				</ul>
				<p class="mb-0 text-right">
					<button class="btn-outline-primary btn"><span class="lnr lnr-heart"></span></button>
					<button class="btn-outline-primary btn">Aplicar</button>
				</p>			
			</div>
		</div>																												
	</div>
</div>
<div class="container mt-5 mb-2">
	<h2 class="text-dark mb-4 text-uppercase relaway font-weight-bold text-center">
		<span class="bg-primary px-2 py-2 rounded text-white lnr lnr-tag"></span> Categorias de Trabajos		
	</h2>
	<div class="row mx-0 mt-3 d-flex justify-content-center">
		<div class="col-lg-2 col-md-4 col-12 mb-3">
			<div class="single-jcat">				
					<img src="{{ asset('icon/src/i (5).png') }}" alt="">				
				<p class="colorT">Desarrollo</p>
			</div>
		</div>
		<div class="col-lg-2 col-md-4 col-6 mb-3">
			<div class="single-jcat">				
					<img src="{{ asset('icon/src/i (3).png') }}" alt="">				
				<p class="colorT">Diseño</p>
			</div>
		</div>
		<div class="col-lg-2 col-md-4 col-6 mb-3">
			<div class="single-jcat">				
					<img src="{{ asset('icon/src/i (4).png') }}" alt="">				
				<p class="colorT">Electronica</p>
			</div>
		</div>
		<div class="col-lg-2 col-md-6 col-6 mb-3">
			<div class="single-jcat">				
					<img src="{{ asset('icon/src/i (6).png') }}" alt="">				
				<p class="colorT">Seguridad</p>
			</div>
		</div>
		<div class="col-lg-2 col-md-6 col-6 mb-3">
			<div class="single-jcat">				
					<img src="{{ asset('icon/src/i (2).png') }}" alt="">				
				<p class="colorT">Servicios</p>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scriptShow')
<script type="text/javascript">    
    particlesJS.load('banner-area','{{ asset('js/particles2.cfg.json') }}');    
</script>
@if($errors->has('notPermission')) 
   <script type="text/javascript">
        swal(
        {
          title: '',
          type: 'warning',
          position: 'bottom-right',
          text: '{{ $errors->first('notPermission') }}',
          confirmButtonText: 'Aceptar',  
        })
   </script>       
@endif
{{-- @if($errors->has('notComplete')) 
   <script type="text/javascript">
        swal(
        {
          title: '',
          type: 'warning',
          position: 'bottom-right',
          text: '{{ $errors->first('notPermission') }}',
          confirmButtonText: 'Aceptar',  
        })
   </script>       
@endif --}}
@endsection

{{-- @section('script')
<script type="text/javascript" src="{{ asset('js/carrousel.js') }}"></script>
@endsection --}}