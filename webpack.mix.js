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

mix.styles([
        'resources/css/files/bootstrap.min.css',
        'resources/css/files/bootstrap-rtl.min.css',
        'resources/css/files/bootstrap-select.min.css',
        'resources/css/files/font-awesome.min.css',
        'resources/css/files/fontiran.css',
        'resources/css/files/sweetalert.css',
        'resources/css/files/admin.css',
    ],
    'public/admin/css/admin.css');

mix.scripts([
        'resources/js/files/jquery.min.js',
        'resources/js/files/bootstrap.min.js',
        'resources/js/files/popper.min.js',
    ],
        'public/admin/js/admin.js');

