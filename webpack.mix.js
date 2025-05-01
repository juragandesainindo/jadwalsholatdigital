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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

// Compile main datatable custom class
mix.js('resources/js/datatable-custom.js', 'public/js')

// Compile page-specific files
   .js('resources/js/pages/jadwal-sholat.js', 'public/js/pages')
   .js('resources/js/pages/petugas-jumat.js', 'public/js/pages')

   .version();
