var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    // original elixir mix sass. I don't need this  sass(bootstrap)
    // mix.sass('app.scss');
    mix.sass('blog-styles.scss','public/css/blog-styles.css');
    mix.scripts([
        'blog-styles.js',
    ],'public/js/blog-styles.js');
    mix.browserSync();
});
