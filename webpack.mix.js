let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.scripts(
[
	'public/js/jquery2.min.js',	
	'public/js/particles.js',
	'public/bootstrap/js/popper.js',
	'public/bootstrap/js/bootstrap.min.js',
	'public/js/sweetAlert.js',
	'public/js/carrousel.js',
	'public/js/jquery.nice-select.min.js',	
	'public/js/cropper/cropper.min.js',
	'resources/assets/js/app.js',
	'resources/assets/js/auth/auth.js',
	'public/js/select2.min.js',
	'public/js/es.js',
	'resources/assets/js/company/app.js',
	'public/js/ckeditor.js',	
], 'public/js/app.js').version();

mix.styles(
[
   'public/css/linearicons.css',
   'public/icon/css/font-awesome.min.css',
   'public/css/animate.css',
   'public/css/fonts.css',   
   'public/bootstrap/css/bootstrap.min.css',
   'public/css/nice-select.css',
   'public/css/owl.carousel.css',
   'resources/assets/css/app.css',   
   'resources/assets/css/auth.css',
   'public/css/select2.min.css',
   'public/js/cropper/cropper.min.css',
], 'public/css/app.css').version();
