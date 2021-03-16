

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

const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.postCss('resources/css/tw.css', 'public/css', [
    require('tailwindcss'),
])
.js('resources/js/app.js', 'public/js')
