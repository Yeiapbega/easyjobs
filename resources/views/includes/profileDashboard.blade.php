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
	<div class="wrapper_search d-flex align-items-center position-relative">
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
							<img src="{{ Auth::user()->photo }}" class="img-fluid img-thumbnail profile-img z-depth-1-2">
						</div>
					</div>	
					<div class="col-lg-10 col-md-9 col-sm-12 px-0">
						<div class="card z-depth-1-2">
							<div class="card-body">
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
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
let c = colorThief.getPalette(sourceImage,2);
console.table(c)
let text = '';
$('.back_color > div.col-4').each(function(key, value) 
{
  $(this).css({'background':'rgb('+c[key]+')'})
}); 
$('.searcher').css({'background':'rgb('+c['1']+')'})
$('.searcher').css({'color':'rgb('+c['0']+')'})
</script>
@endsection