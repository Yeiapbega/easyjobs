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
	'public/js/jquery.js',
	'public/js/particles.js',
	'public/bootstrap/js/popper.js',
	'public/bootstrap/js/bootstrap.min.js',
	'public/js/sweetAlert.js',
	'public/js/jquery.nice-select.min.js',	
	'resources/assets/js/app.js',
	'resources/assets/js/auth/auth.js'
], 'public/js/app.js').version();

mix.styles(
[
   'public/css/animate.css',
   'public/css/fonts.css',
   'public/icon/css/all.css',
   'public/bootstrap/css/bootstrap.min.css',
   'public/css/nice-select.css',
   'resources/assets/css/app.css',
   'public/css/lnr-font.min.css'
], 'public/css/app.css').version();
