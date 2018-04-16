let mix = require('laravel-mix');

mix
    .js('resources/assets/js/app.js', 'public/js')
    .extract([
        'axios',
        'jquery',
        'lodash',
        'popper.js',
        'vue',
    ])
    .autoload({
        'axios': ['axios', 'window.axios'],
        'jquery': ['$', 'jQuery', 'window.jQuery'],
        'lodash': ['lodash', 'window._'],
        'popper.js': ['Popper', 'window.Popper'],
        'vue': ['Vue', 'window.Vue'],
    })
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/style.scss', 'public/css')
    .sass('resources/assets/sass/navbar.scss', 'public/css')
    .sass('resources/assets/sass/ui.scss', 'public/css')
    .styles(
        [
            'public/css/style.css',
            'public/css/navbar.css',
            'public/css/ui.css'
        ],
        'public/css/all.css'
    )
    .sourceMaps();