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

mix.styles('resources/views/projectcruize/css/soccer.min.css', 'public/css/soccer.min.css').version();
mix.styles('resources/views/projectcruize/css/login_style.min.css', 'public/css/login.min.css').version();