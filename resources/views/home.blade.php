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
@if(!Auth::check())
<section class="features-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 mb-2">
				<div class="single-feature">
					<h5 class="nira">Busqueda</h5>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing.
					</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 mb-2">
				<div class="single-feature">
					<h5 class="nira">Aplicación</h5>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing.
					</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="single-feature">
					<h5 class="nira">Seguridad</h5>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing.
					</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="single-feature">
					<h5 class="nira">Notificación</h5>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing.
					</p>
				</div>
			</div>																		
		</div>
	</div>	
</section>
<br>
@endif
<div class="container mt-3 mb-5">
	<h2 class="text-dark mb-5 mt-5 nira text-uppercase font-weight-bold text-center" style="letter-spacing: 5px;">
		<span class="bg-primary pl-2 py-2 pr-1 rounded text-white lnr lnr-layers"></span> Trabajos Recientes		
	</h2>
	<div class="carusel-beta">
		<div class="single-testimonial item card rounded bg-dark text-white">							
			<div class="card-body">
				<h5 class="text-white bold">
					<span class="lnr lnr-briefcase"></span> Job Tessting
				</h5>
				<hr class="mb-1">
				{{-- <img class="mx-auto" src="img/t2.png" alt=""> --}}
				<p class="desc-job text-justify mb-1">					
					Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
				</p>								
				<ul class="info-job list-unstyled mb-0">					
				{{-- 	@if(Auth::check())
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
					@endif --}}
					<li>
						<small class="tags-jobs">
							<span class="lnr lnr-tag"></span>
							<a href="#!"><span class="badge badge-light">Diseño</span></a>
							<a href="#!"><span class="badge badge-light">Arte</span></a>
							<a href="#!"><span class="badge badge-light">Tecnologia</span></a>
						</small>
					</li>
				</ul>
				<p class="mb-0 text-right">					
					<button class="btn-primary btn">Aplicar</button>
				</p>			
			</div>
		</div>		
		<div class="single-testimonial item card rounded bg-dark text-white">							
			<div class="card-body">
				<h5 class="text-white bold">
					<span class="lnr lnr-briefcase"></span> Job Tessting
				</h5>
				<hr class="mb-1">
				{{-- <img class="mx-auto" src="img/t2.png" alt=""> --}}
				<p class="desc-job text-justify mb-1">					
					Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
				</p>								
				<ul class="info-job list-unstyled mb-0">					
				{{-- 	@if(Auth::check())
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
					@endif --}}
					<li>
						<small class="tags-jobs">
							<span class="lnr lnr-tag"></span>
							<a href="#!"><span class="badge badge-light">Diseño</span></a>
							<a href="#!"><span class="badge badge-light">Arte</span></a>
							<a href="#!"><span class="badge badge-light">Tecnologia</span></a>
						</small>
					</li>
				</ul>
				<p class="mb-0 text-right">					
					<button class="btn-primary btn">Aplicar</button>
				</p>			
			</div>
		</div>		
		<div class="single-testimonial item card rounded bg-dark text-white">							
			<div class="card-body">
				<h5 class="text-white bold">
					<span class="lnr lnr-briefcase"></span> Job Tessting
				</h5>
				<hr class="mb-1">
				{{-- <img class="mx-auto" src="img/t2.png" alt=""> --}}
				<p class="desc-job text-justify mb-1">					
					Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
				</p>								
				<ul class="info-job list-unstyled mb-0">					
				{{-- 	@if(Auth::check())
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
					@endif --}}
					<li>
						<small class="tags-jobs">
							<span class="lnr lnr-tag"></span>
							<a href="#!"><span class="badge badge-light">Diseño</span></a>
							<a href="#!"><span class="badge badge-light">Arte</span></a>
							<a href="#!"><span class="badge badge-light">Tecnologia</span></a>
						</small>
					</li>
				</ul>
				<p class="mb-0 text-right">					
					<button class="btn-primary btn">Aplicar</button>
				</p>			
			</div>
		</div>																											
	</div>
</div>
@if(!Auth::check())
<div class="container pt-5 mb-5">
	<h2 class="text-dark mb-5 nira text-uppercase font-weight-bold text-center" style="letter-spacing: 5px;">
		<span class="bg-primary pl-2 py-2 pr-1 rounded text-white lnr lnr-tag"></span> Categorias de Trabajos		
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
<div class="section w-100 mt-5 mb-5 py-5 d-flex justify-content-center p1-gradient-bg">
	<div class="wrapper">
		<h2 class="relaway text-white mb-2 text-center bold pt-5">
			Unete hoy a <span class="dosis bold">EasyJobs</span> y se parte de nuestra comunidad
		</h2>
		<p class="text-center text-white mb-4">
			Puedes ser contratado o contratar <br> en <strong class="dosis">EasyJobs</strong> tienes la oportunidad y la facilidad <br> de conseguir trabajo o de buscar a esa persona que necesitas para tu trabajo
		</p>
		<p class="text-center pb-5">
			<a href="#!" class="btn btn-outline-light">
				Soy un Trabajador
			</a>
			<a href="#!" class="btn btn-outline-light">
				Soy un Contratante
			</a>
		</p>
	</div>
</div>
@else
<div class="container mt-3 pt-3 px-2">
	<div class="row mx-0 pt-0">
		<div class="col-lg-8 col-md-7 col-sm-12 pt-0 mb-3 px-1">
			<div class="item card rounded mb-3">							
				<div class="card-body">
					<h5 class="bold">
						<span class="lnr lnr-briefcase"></span> Job Tessting
					</h5>
					<hr class="mb-1">
					{{-- <img class="mx-auto" src="img/t2.png" alt=""> --}}
					<p class="desc-job text-justify mb-1">					
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
					</p>								
					<ul class="info-job list-unstyled mb-0">					
						@if(Auth::check())
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
						@endif
						<li class="tags-jobs">							
							<span class="lnr lnr-tag"></span>
							<a href="#!"><span class="badge badge-dark">Diseño</span></a>
							<a href="#!"><span class="badge badge-dark">Arte</span></a>
							<a href="#!"><span class="badge badge-dark">Tecnologia</span></a>							
						</li>
					</ul>
					<p class="mb-0 text-right">
						<button class="btn-outline-primary btn"><span class="lnr lnr-heart"></span></button>
						<button class="btn-outline-primary btn">Aplicar</button>
					</p>			
				</div>
			</div>
			<div class="item card rounded mb-3">							
				<div class="card-body">
					<h5 class="bold">
						<span class="lnr lnr-briefcase"></span> Job Tessting
					</h5>
					<hr class="mb-1">
					{{-- <img class="mx-auto" src="img/t2.png" alt=""> --}}
					<p class="desc-job text-justify mb-1">					
						Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
					</p>								
					<ul class="info-job list-unstyled mb-0">					
						@if(Auth::check())
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
						@endif
						<li class="tags-jobs">							
							<span class="lnr lnr-tag"></span>
							<a href="#!"><span class="badge badge-dark">Diseño</span></a>
							<a href="#!"><span class="badge badge-dark">Arte</span></a>
							<a href="#!"><span class="badge badge-dark">Tecnologia</span></a>							
						</li>
					</ul>
					<p class="mb-0 text-right">
						<button class="btn-outline-primary btn"><span class="lnr lnr-heart"></span></button>
						<button class="btn-outline-primary btn">Aplicar</button>
					</p>			
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-5 col-sm-12 px-3 h-100">
			<div class="bg-light py-4 px-4 mb-3">
				<h5 class="nira bold text-left letter-spacing">
				Categorias
				</h5>
				<ul class="list-group categoy-list">
				  {!! App\Http\Controllers\TagController::viewTags() !!}
				</ul>
			</div>
			<div class="bg-light py-4 px-4">
				<h5 class="nira bold text-left">
				Top 5 Usuarios Destacados
				</h5>
				<div class="carusel-users-top mt-3">
					<div class="card top-user border-0">						
						<div style="position: relative;">
							<img src="{{ asset(Auth::user()->photo) }}" class="userImgTop img-fluid img-thumbnail rounded-circle z-depth-1-2">
							<img class="card-img-top" src="{{ asset('src/textures/backs/back (2).jpg') }}" alt="Card image cap">
						</div>
						<div class='ribbon-wrapper-1'>
							<div class='ribbon-1'>#1</div>
						</div>
						<div class="card-body">							
							<h6 class="card-title font-weight-bold text-capitalize text-center">example user name</h6>					    
							<p class="text-center my-0">
								<a href="#" class="btn bold relaway btn-dark btn-sm">Visitar Perfil</a>
							</p>				    
						</div>
					</div>
					<div class="card top-user border-0">						
						<div style="position: relative;">
							<img src="{{ asset(Auth::user()->photo) }}" class="userImgTop img-fluid img-thumbnail rounded-circle z-depth-1-2">
							<img class="card-img-top" src="{{ asset('src/textures/backs/back (2).jpg') }}" alt="Card image cap">
						</div>
						<div class='ribbon-wrapper-1'>
							<div class='ribbon-1'>#1</div>
						</div>
						<div class="card-body">							
							<h6 class="card-title font-weight-bold text-capitalize text-center">example user name</h6>					    
							<p class="text-center my-0">
								<a href="#" class="btn bold relaway btn-dark btn-sm">Visitar Perfil</a>
							</p>				    
						</div>
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>
@endif
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