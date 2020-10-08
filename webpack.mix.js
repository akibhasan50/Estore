const mix = require('laravel-mix');

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

mix.sass('resources/sass/app.scss', 'public/css')
    .styles([
        'public/ui/fontend/assets/css/bootstrap.min.css',
        'public/ui/fontend/assets/css/owl.carousel.min.css',
        'public/ui/fontend/assets/css/flaticon.css',
        'public/ui/fontend/assets/css/slicknav.css',
        'public/ui/fontend/assets/css/animate.min.css',
        'public/ui/fontend/assets/css/magnific-popup.css',
        'public/ui/fontend/assets/css/fontawesome-all.min.css',
        'public/ui/fontend/assets/css/themify-icons.css',
        'public/ui/fontend/assets/css/slick.css',
        'public/ui/fontend/assets/css/nice-select.css',
        'public/ui/fontend/assets/css/style.css'

    ], 'css/all.css');
