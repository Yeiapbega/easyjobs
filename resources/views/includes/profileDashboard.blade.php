<style type="text/css">
.particles-js-canvas-el
{
	/*height: 100% !important;
	top: 20%;*/
	z-index: 0;
	width: 100% !important;
}
</style>
<div class="w-100 px-5 py-2 searcher">
	<div class="wrapper_search container d-flex align-items-center position-relative">
		<input type="search" name="searchEasy" class="relaway bold" placeholder="Busca personas o trabajos">
		<div class="wrap-ser">
			<div class="s">
				<i class="lnr lnr-magnifier icon-s"></i>
			</div>
			<div class="s">			
				<i class="fa fa-spinner fa-pulse icon-l" hidden></i>			
			</div>
			<div class="s">						
				<i class="lnr lnr-cross icon-c" hidden></i>
			</div>
		</div>
	</div>
</div>
<section class="w-100 wrapper-profile position-relative d-flex justify-content-start" id="wrapper-profile">
	{{-- <div class="overlay overlay-bg"></div> --}}
	<div class="row mx-0 w-100">
		<div class="col-lg-12 px-0 row mx-0 back_color">
			<div class="col-4"></div>
			<div class="col-4"></div>
			<div class="col-4"></div>
			<div class="col-lg-12 d-flex div-img-user justify-content-lg-center justify-content-md-center justify-content-sm-center justify-content-center">
				<div class="mb-0 container row">
					<div class="col-lg-2 col-md-3 d-flex justify-content-center col-sm-12 px-0">
						<div>
							<p class="text-center">
								<img src="{{ Auth::user()->photo }}" class="img-fluid img-thumbnail profile-img z-depth-1-2">
							</p>
							<p class="mt-2 nira bold text-center">{{ Auth::user()->fsname }}</p>
						</div>
					</div>	
					<div class="col-lg-10 col-md-9 col-sm-12 px-2">
						<div class="card" style="box-shadow: 0px 0px 40px 0px rgba(132, 144, 255, 0.2);">
							<div class="card-body">
								<span class="heading bold nira">Tu Rating</span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<p><strong>4.1</strong> puntaje basado en 254 reviews.</p>
								<hr style="border:3px solid #f1f1f1">

								<div class="row mx-0 px-2">
								  <div class="side">
								    <div>5 star</div>
								  </div>
								  <div class="middle">
								    <div class="bar-container">
								      <div class="bar-5"></div>
								    </div>
								  </div>
								  <div class="side right">
								    <div>150</div>
								  </div>
								  <div class="side">
								    <div>4 star</div>
								  </div>
								  <div class="middle">
								    <div class="bar-container">
								      <div class="bar-4"></div>
								    </div>
								  </div>
								  <div class="side right">
								    <div>63</div>
								  </div>
								  <div class="side">
								    <div>3 star</div>
								  </div>
								  <div class="middle">
								    <div class="bar-container">
								      <div class="bar-3"></div>
								    </div>
								  </div>
								  <div class="side right">
								    <div>15</div>
								  </div>
								  <div class="side">
								    <div>2 star</div>
								  </div>
								  <div class="middle">
								    <div class="bar-container">
								      <div class="bar-2"></div>
								    </div>
								  </div>
								  <div class="side right">
								    <div>6</div>
								  </div>
								  <div class="side">
								    <div>1 star</div>
								  </div>
								  <div class="middle">
								    <div class="bar-container">
								      <div class="bar-1"></div>
								    </div>
								  </div>
								  <div class="side right">
								    <div>20</div>
								  </div>
								</div>
							</div>
						</div>
					</div>		
					<div class="col-lg-10 mt-3 col-md-12 col-sm-12 px-0 offset-0 offset-lg-2 offset-sm-0 offset-md-0">
						<div class="row mx-0 px-0">
							@if(Auth::user()->rol_id != 3)
							<div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-3">
								<div class="single-jcat controls-profile">
									<i class="lnr lnr-question-circle" data-toggle="tooltip" data-html="true" title="<b>INFO</b><br><small class='pb-2 text-center'>En esta opción podras publicar tus ofertas de trabajo que seran vistas por todos los usuarios de <b>EasyJobs</b></small>"></i>				
									<img src="{{ asset('icon/src/add.png') }}" alt="">				
									<p class="colorT nira">Publicar Trabajo</p>
								</div>
							</div>							
							@endif
							<div class="col-lg-3 col-md-6 col-6 mb-3">
								<div class="single-jcat controls-profile">
									<i class="lnr lnr-question-circle" data-toggle="tooltip" data-html="true" title="<b>INFO</b><br><small class='pb-2 text-center'>En esta opción podras cambiar la información referente a tu cuenta de <b>EasyJobs</b></small>"></i>				
									<img src="{{ asset('icon/src/editUser.png') }}" alt="">				
									<p class="px-2 colorT nira">Editar Información</p>
								</div>
							</div>
							@if(Auth::user()->rol_id == 3)
							<div class="col-lg-3 col-md-6 col-6 mb-3">
								<div class="single-jcat controls-profile">
									<i class="lnr lnr-question-circle" data-toggle="tooltip" data-html="true" title="<b>INFO</b><br><small class='pb-2 text-center'>Las etiquetas ayudan a <b>EasyJobs</b> a clasificar los trabajos que tienen más afinidad contigo, para asi poder mostrarte trabajos relacionados a tus gustos</small>"></i>
									<img src="{{ asset('icon/src/tag.png') }}" alt="">				
									<p class="px-2 colorT nira">Etiquetas <b>EasyJobs</b></p>
								</div>
							</div>
							@else
							<div class="col-lg-3 col-md-6 col-6 mb-3">
								<div class="single-jcat controls-profile">
									<i class="lnr lnr-question-circle" data-toggle="tooltip" data-html="true" title="<b>INFO</b><br><small class='pb-2 text-center'>Las etiquetas ayudan a <b>EasyJobs</b> a clasificar tus trabajos y los hace mas faciles de buscar para otros usuarios</small>"></i>
									<img src="{{ asset('icon/src/tag.png') }}" alt="">				
									<p class="px-2 colorT nira">Etiquetas <b>EasyJobs</b></p>
								</div>
							</div>	
							@endif						
							<div class="col-lg-3 col-md-6 col-12 mb-3">
								<div class="single-jcat controls-profile">
									<i class="lnr lnr-question-circle" data-toggle="tooltip" data-html="true" title="<b>INFO</b><br><small class='pb-2 text-center'>Ponte en contacto con un desarrollador de <b>EasyJobs</b> y cuentale tu problema</small>"></i>				
									<img src="{{ asset('icon/src/bug.png') }}" alt="">				
									<p class="px-2 colorT nira">Reporte de Errores</p>
								</div>
							</div>									
						</div>													
					</div>	
				</div>
			</div>
		</div>		
	</div>
</section>		
</div>
<div class="container">
</div>
@section('scriptShow')
{{-- <script type="text/javascript">    
    particlesJS.load('wrapper-profile','{{ asset('js/particles.cfg.json') }}');    
</script> --}}
<script type="text/javascript" src="{{ asset('js/color-thief.js') }}"></script>
<script type="text/javascript">
	var colorThief = new ColorThief();
sourceImage = $('.profile-img').get(0)
let c = colorThief.getPalette(sourceImage,5);
console.table(c)
let text = '';
$('.back_color > div.col-4').each(function(key, value) 
{
  $(this).css({'background':'rgb('+c[key]+')'})
}); 
$('.searcher').css({'background':'rgb('+c['1']+')'})
$('.searcher').css({'color':'rgb('+c['0']+')'})
$('.bar-1').css({'background':'rgb('+c['0']+')'})
$('.bar-2').css({'background':'rgb('+c['1']+')'})
$('.bar-3').css({'background':'rgb('+c['2']+')'})
$('.bar-4').css({'background':'rgb('+c['3']+')'})
$('.bar-5').css({'background':'rgb('+c['4']+')'})
</script>
@endsection