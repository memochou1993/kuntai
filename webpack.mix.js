let mix = require('laravel-mix');

mix
    .js('resources/assets/js/app.js', 'public/js')
    .extract([
        'jquery',
    ])
    .autoload({
        'jquery': ['$', 'jQuery', 'window.jQuery'],
    })
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/style.scss', 'public/css')
    .sass('resources/assets/sass/navbar.scss', 'public/css')
    .styles(
        [
            'public/css/style.css',
            'public/css/navbar.css',
        ],
        'public/css/all.css'
    )
    .sourceMaps();