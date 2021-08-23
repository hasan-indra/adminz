const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js');
mix.postCss('resources/css/app.css', 'public/css');

// publish adminlte
mix.copy('node_modules/admin-lte/dist','public/adminlte/dist');
mix.copy('node_modules/admin-lte/plugins','public/adminlte/plugins');
