@extends('main')
@section('title', 'home')
@section('styles')
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
{{-- <div class="container">
	<div class="carusel-beta">
		<!-- <div class="single-testimonial item">
			<img class="mx-auto" src="img/t2.png" alt="">
			<p class="desc">
				Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker, projector, hardware and more. laptop accessory
			</p>
			<h4>Mark Alviro Wiens</h4>
			<p>
				CEO at Google
			</p>
		</div> -->
		<div class="single-post d-flex justify-content-between">
			<div class="thumb">
				<img src="{{ asset('src/logo/logoShort.png') }}" alt="">
				<a class="btns text-uppercase" href="#">view job post</a>
			</div>
			<div class="details">
				<a href="#"><h4>Creative Designer</h4></a>
				<h6>Los Angeles</h6>
				<p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temporinc ididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam quis.
				</p>
			</div>
		</div>																												
	</div>
</div> --}}
@endsection
@section('scriptShow')
<script type="text/javascript">    
    particlesJS.load('banner-area','{{ asset('js/particles2.cfg.json') }}');    
</script>
@endsection
{{-- @section('script')
<script type="text/javascript" src="{{ asset('js/carrousel.js') }}"></script>
@endsection --}}