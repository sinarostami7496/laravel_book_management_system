let mix = require('laravel-mix');

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

function resolve (dir) {
  return path.join(__dirname, 'resources/assets', dir)
}

mix.webpackConfig({
  resolve: {
    alias: {
      '@': resolve('js')
    }
  }
})

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .browserSync({
     proxy: 'localhost:2019',
     notify: false
   })