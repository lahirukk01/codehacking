var elixir = require('laravel-elixir')


elixir(function (mix) {
    mix.sass('app.scss')
        .styles([
            'libs/blog-post.css',
            'libs/bootstrap.css',
            'libs/font-awesome.css',
            'libs/metisMenu.css',
            'sb-admin-2.css',
            'styles.css'
        ], '/public/css/libs.css')
        .scripts([
            'bootstrap.js',
            'jquery.js',
            'metisMenu.js',
            'sb-admin-2.js',
            'scripts.js'
        ], '/public/js/libs.js')
})