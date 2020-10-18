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
    'node_modules/bootstrap-social/bootstrap-social.css'
], 'public/css/lib.css');

mix.styles([
    'resources/css/style.css',
    'resources/css/components.css',
    'resources/css/custom.css'
], 'public/css/app.css');

mix.scripts([
    'resources/js/stisla.js',
    'resources/js/jquery-ui.min.js'
], 'public/js/lib.js');

mix.scripts([
    'resources/js/scripts.js',
    'resources/js/custom.js'
], 'public/js/app.js');

mix.copy('resources/assets', 'public/assets');
