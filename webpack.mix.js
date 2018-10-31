let mix = require('laravel-mix');
mix.setPublicPath('public');

let basePath = 'resources/';
let Js = basePath + 'js/';
let Sass = basePath + 'sass/';
let Assets = basePath + 'assets/';
let DashboradJs =  Js + 'dashboard/';
let DashboradSass =  Sass + 'dashboard/';

    // Copy Dashboard Staff To Public
    // copy all the fonts
    mix.copy( Assets + 'fonts/', 'public/fonts');
    // copy all the sound
    mix.copy( Assets + 'sounds/','public/sounds');
    // copy all the images
    mix.copy( Assets + 'images/', 'public/images');

    // The Default Theme For The Ironside
    mix.sass( Sass + 'dashboard.scss','public/css/dashboard/theme.css');
    mix.sass( Sass + 'rtl.scss','public/css/dashboard/rtl.css');
    mix.sass( Sass + 'ltr.scss','public/css/dashboard/ltr.css');

    mix.styles([
        // // ironside
       //  path + 'sass/dashboard/css/vendor/select2.css',
       //  path + 'sass/dashboard/css/vendor/lightbox.css',
       // path + 'sass/dashboard/css/vendor/dropzone.css',
       //  path + 'sass/dashboard/css/vendor/summernote.css',
       //  path + 'sass/dashboard/css/vendor/daterangepicker.css',
       //  path + 'sass/dashboard/css/vendor/pace-theme-flash.css',
       // path + 'sass/dashboard/css/vendor/bootstrap-datetimepicker.css',
       //  path + 'sass/dashboard/css/vendor/datatables.bootstrap.css',
       // path + 'sass/dashboard/css/vendor/responsive.bootstrap.css',
       //
       // path + 'sass/dashboard/css/ironside/ironside.css',
       // path + 'sass/dashboard/css/ironside/charts.css',
       // path + 'sass/dashboard/css/ironside/superbox.css',
       // path + 'sass/dashboard/css/ironside/nestable.css',
       // path + 'sass/dashboard/css/ironside/datatables.css',
       // path + 'sass/dashboard/css/ironside/checkboxes.css',
       // path + 'sass/dashboard/css/ironside/notify.css',

    ],'public/css/dashboard/dashboard.css')
        .js('resources/js/app.js', 'public/js')
        .scripts([
            // plugins
            DashboradJs + 'js/morris-chart.js',
            DashboradJs + 'js/calendar-2.js',
            DashboradJs + 'js/owl-carousel.js',
            DashboradJs + 'js/vendor/pace.js',
            DashboradJs + 'js/vendor/chart.js',
            DashboradJs + 'js/vendor/select2.js',
            DashboradJs + 'js/vendor/dropzone.js',
            DashboradJs + 'js/vendor/lightbox.js',
            DashboradJs + 'js/plugins/fastclick.js',
            DashboradJs + 'js/vendor/summernote.js',
            DashboradJs + 'js/vendor/jquery.nestable.js',
            DashboradJs + 'js/vendor/jquery.cookie.js',

            // date picker
            DashboradJs + 'js/vendor/moment.js',
            DashboradJs + 'js/vendor/daterangepicker.js',
            DashboradJs + 'js/vendor/bootstrap-datetimepicker.js',
            //
            // // datatables | 1.10.11
            // https://datatables.net/extensions/responsive/classes
            DashboradJs + 'js/vendor/jquery.datatables.js',
            DashboradJs + 'js/vendor/datatables.bootstrap.js',
            DashboradJs + 'js/vendor/datatables.responsive.js',
            //
            // // ironside
            DashboradJs + 'js/ironside/ironside.js',
            DashboradJs + 'js/ironside/buttons.js',
            DashboradJs + 'js/ironside/notify.js',
            DashboradJs + 'js/ironside/datatables.js',
            DashboradJs + 'js/ironside/google_maps.js',
            DashboradJs + 'js/ironside/notifications.js',

        ],'public/js/dashboard/dashboard.js')
        .scripts([
            DashboradJs + 'js/admin.js',
            DashboradJs + 'js/jquery.slimscroll.js',
            DashboradJs + 'js/sidebarmenu.js',
            DashboradJs + 'js/sticky-kit.js',
            DashboradJs + 'js/scripts.js',
        ],'public/js/dashboard/theme.js');


if (mix.inProduction()) {
    mix.version();
}

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css')
//    .sass('resources/assets/sass/override.scss', 'public/css');
