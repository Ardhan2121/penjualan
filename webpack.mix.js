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
    .sass('resources/sass/app.scss', 'public/css')
    .copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/assets/modules/bootstrap/css')
    .copy('node_modules/fontawesome/css/all.min.css', 'public/assets/modules/fontawesome/css')
    .copy('node_modules/datatables/datatables.min.css', 'public/assets/modules/datatables/datatables.min.css')
    .copy('node_modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css', 'public/assets/modules/datatables/DataTables-1.10.16/css')
    .copy('node_modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css', 'public/assets/modules/datatables/Select-1.2.4/css')
    .copy('node_modules/izitoast/css/iziToast.min.css', 'public/assets/modules/izitoast/css')
    // Tambahkan penyalinan lainnya di sini sesuai kebutuhan Anda
    .webpackConfig({
        plugins: [
            new CopyPlugin({
                patterns: [
                    // Contoh penyalinan file-file lainnya dari node_modules ke public/assets/modules
                    { from: 'node_modules/plugin-name/dist/css/*.min.css', to: 'public/assets/modules/plugin-name/css', flatten: true },
                    { from: 'node_modules/plugin-name/dist/js/*.min.js', to: 'public/assets/modules/plugin-name/js', flatten: true },
                    // Penyalinan lebih lanjut sesuai kebutuhan proyek Anda
                ],
            }),
        ],
    });
