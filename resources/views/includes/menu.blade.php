{{-- {!! Auth::user()->toJSON(JSON_PRETTY_PRINT) !!} --}}
<button type="button" id="mobile-nav-toggle"><i class="lnr lnr-menu"></i></button>
<header id="header" class="{{ str_contains(url()->current(), '/home') ? 'bg-dark' : ''}}">
    <div class="container container-nav">
    	<div class="row align-items-center justify-content-between d-flex">
	      <div id="logo">
	        <a href="{{ url('/') }}" class="dosis text-white font-weight-bold" style="font-size: 22px;">
	        	@if(Auth::check())<img src="{{ asset(Auth::user()->photo) }}" class="img-thumbnail img-fluid rounded-circle logoShort" style="width: 35px;top: 0px;">
	        	@else<img src="{{ asset('src/logo/logoShort.png') }}" alt="" title="" class="logoShort">
	        	@endif
	        	 EasyJobs <small class="relaway name-user-nav">	        	 	
	        	 	@if(Auth::check()) <?php $nam = explode(" ", Auth::user()->fsname) ?> • {!! $nam[0] !!} @endif
	        	 </small>
	        </a>
	      </div>
	      <nav id="nav-menu-container">
	        <ul class="nav-menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">	            
	        	<li class="menu-active"><a href="{{ url('/') }}" class="relaway">Inicio</a></li> 
	            @if(!Auth::check())	              
	              <li><a href="" class="relaway">Conocenos</a></li>
	               @if(!str_contains(url()->current(), ['login', 'register']))
					  <li><a class="relaway btn btn-sm btn-outline-light" href="{{ url('register') }}">Sign-up</a></li>
		          	  <li><a class="relaway btn btn-sm btn-outline-light" href="{{ url('login') }}">Login</a></li>	      
		           @endif    	 
	            @else
	            <li><a class="font-weight-bold px-2 btn btn-sm btn-outline-light py-1" style="font-size: 17px;" data-toggle="tooltip" data-placement="bottom" title="Ranking Global" href="#"><i class="lnr lnr-earth"></i></a></li>
	            <li><a class="font-weight-bold px-2 btn btn-sm btn-outline-light py-1" style="font-size: 17px;" data-toggle="tooltip" data-placement="bottom" title="Nivel de Confianza" href="#"><i class="lnr lnr-star"></i></a></li>
	            <li>
	            	<a class="font-weight-bold px-2 btn btn-sm btn-outline-light py-1" style="font-size: 17px;" href="#" id="notificationLink">
	            		<i class="lnr lnr-alarm"></i>
	            		<span class="badge badge-light" style="position: relative;top: -3px;">1</span>
	            	</a>
	            	<div id="notificationContainer" class="shadow-lg pt-0 pb-0">
						<div id="notificationTitle" class="py-2 px-3 bg-dark">
							<h6 class="mb-0 quick">
								<strong>
									Notificaciones
								</strong>
							</h6>
						</div>
						<p class="mb-0 w-100 new-noti px-3 quick py-1">
							NEW
						</p>
						<div id="notificationsBody" class="px-0 py-2">
							<div class="row mx-0">								
								<div class="cont col-12 row mx-0 px-3 pt-1 notification hoverable">
									<div class="col-2 px-0">									
										<img src="{{ asset(Auth::user()->photo) }}" class="img-thumbnail img-fluid rounded-circle float-left">		
									</div>
									<div class="col-10">
										<p class="mb-0 quick" style="font-size:12px;">
											<strong>{{ Auth::user()->fsname }}</strong> <br>
											quiere contactar contigo
										</p>
										<p class="mb-0">
											<a class="black-text px-0 pt-0" href="tel:{{ Auth::user()->phone }}"><span class="lnr lnr-phone text-info"></span> {{ Auth::user()->phone }}</a>
										</p>
									</div>
								</div>

							</div>							
						</div>						
						<div id="notificationFooter" class="py-2">
							<a href="#" class="relaway btn btn-sm btn-outline-light px-2">See All</a>
						</div>
					</div>
	            </li>
	            @if(!str_contains(url()->current(), '/home'))
	          	<li><a class="dashboard font-weight-bold px-2 btn btn-sm btn-outline-light py-1" style="font-size: 17px;" data-toggle="tooltip" data-placement="bottom" title="Panel Principal" href="{{ session()->get('url') }}"><i class="lnr lnr-home"></i></a></li>	 
	          	@endif
	          	<li><a class="font-weight-bold px-2 btn btn-sm btn-outline-light py-1" style="font-size: 17px;" data-toggle="tooltip" data-placement="bottom" title="Salir" href="{{ url('/logout') }}"><i class="lnr lnr-exit"></i></a></li>         	
	          @endif				          				          
	        </ul>
	      </nav><!-- #nav-menu-container -->		    		
    	</div>
    </div>
  </header>
