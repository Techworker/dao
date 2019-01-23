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

mix.webpackConfig({
    resolve: {
        alias: {
            'jquery-ui/widget': 'blueimp-file-upload/js/vendor/jquery.ui.widget.js',
            'jquery-fileupload': 'blueimp-file-upload/js/vendor/jquery.fileupload.js',
            'handlebars/runtime': 'handlebars/dist/handlebars.runtime.js',
            'jquery': 'jquery/dist/jquery.js'
            }
    },
    module: {
        loaders: [
            {
                test: require.resolve("blueimp-file-upload"),
                loader: "imports?define=>false"
            },
            {
                test: /\.hbs$/,
                loader: 'handlebars-loader/index.js',
                query: {
                    runtime: 'handlebars/dist/handlebars.runtime.js',
                }
            },
            {
                test: require.resolve("medium-editor-insert-plugin"),
                loader: "imports?define=>false"
            }
        ]
    }
});

mix.js('resources/js/app.js', 'public/js');
mix.sass('resources/sass/app.scss', 'public/css');
