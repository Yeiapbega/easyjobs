<style type="text/css">
.particles-js-canvas-el
{
	/*height: 100% !important;
	top: 20%;*/
	z-index: 0;
	width: 100% !important;
}
</style>
<section class="w-100 wrapper-profile position-relative d-flex justify-content-start" id="wrapper-profile">
	{{-- <div class="overlay overlay-bg"></div> --}}
	<div class="text-center mb-0" style="z-index: 100;max-width: 300px">
		<img src="{{ Auth::user()->photo }}" class="img-fluid img-thumbnail" style="width: 15vw;">
		<p class="my-3">
			<button class="d-flex justify-content-between btn-block btn btn-dark mb-2">
				Datos Personales <span class="lnr lnr-user"></span>
			</button>
			<button class="d-flex justify-content-between btn-block btn btn-dark mb-2">
				Registrar oferta <span class="lnr lnr-plus-circle"></span>
			</button>
		</p>
	</div>
</section>		
</div>
<div class="container">
</div>
{{-- @section('scriptShow')
<script type="text/javascript">    
    particlesJS.load('wrapper-profile','{{ asset('js/particles.cfg.json') }}');    
</script>
@endsection --}}