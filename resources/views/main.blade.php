<!doctype html>
<html lang="{{ app()->getLocale() }}" class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{ asset('src/logo/ico.png') }}" />
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>EJ • @yield('title')</title>
    {{--      <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#5dc1b9">
        <meta name="theme-color" content="#5dc1b9">
        <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
        <meta name="description" content="Los meta tags de HTML codifican información para ser interpretada por el navegador y los buscadores."/>
        <meta name="google" content="nositelinkssearchbox" />
        <meta name="robots" content="index,follow">
        <meta name="googlebot" content="all" />
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport' /> --}}
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome.min.css') }}"> --}}
        @yield('styles')
    </head>            
    <body class="animated fadeIn">
    <div id="main-contain">    
        @yield('content')        
    </div>    
    @if(Auth::check())
        @if(App\Http\Controllers\Auth\RegisterController::isComplete(Auth::user()->id))        
            <div class="modal fade" id="fistLoginSocial" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog" role="document" style="max-width: 650px;">
                <div class="modal-content rounded-0">
                  <div class="modal-header">
                    <h4 class="dosis modal-title colorT" id="fistLoginSocialTitle">Ya casi has terminado!</h4>
                    <button type="button" class="close" style="outline:none;">
                      <span aria-hidden="true">
                          <i class="lnr lnr-flag"></i>
                      </span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p class="colorT">Necesitamos que completes estos campos para mejorar tu experiencia en <b class="dosis">EasyJobs</b></p>
                    <form autocomplete="off" name="firstSocialLogin">
                        <div class="row mx-0">
                            <div class="input-group mb-2 col-lg-6 px-1 col-sm-12">
                                <div class="input-group-prepend">
                                  <div class="input-group-text input-icon-easy">
                                    <i class="lnr lnr-user"></i>
                                  </div>
                                </div>
                                <input type="number" name="dni" class="validEmpty form-control form-control-lg input-easy" placeholder="Identificacion">
                            </div>
                            <div class="input-group mb-2 col-lg-6 px-1 col-sm-12">
                                <select class="select w-100" name="rol" id="rol">
                                    <option selected disabled>Planeas Usar La Plataforma Para</option>
                                    <option value="2">Contratar</option>
                                    <option value="3">Ser Contratado</option>
                                    <option value="4">Ambos</option>
                                </select>
                            </div>
                        </div>
                    </form>
                  </div>
                  <div class="modal-footer">                    
                    <button type="button" name="firstSocialLogin" class="btn btn-primary">Guardar <i class="lnr lnr-checkmark-circle"></i></button>
                  </div>
                </div>
              </div>
            </div>    
            <script type="text/javascript">
                $('.select').niceSelect();                
            </script>             
        @endif
    @endif   
    <script type="text/javascript" src="{{ asset('js/socket.io.js') }}"></script>
    @yield('script')
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>    
    @yield('scriptShow')    
</body>
</html>
