let mix = require('laravel-mix');

mix.sass('resources/sass/dashboard.scss','public/css/theme.css');
mix.sass('resources/sass/rtl.scss','public/css/rtl.css');
mix.sass('resources/sass/ltr.scss','public/css/ltr.css');
mix.js('resources/js/app.js', 'public/js/master.js');

mix.combine([
    'resources/js/theme/jquery.slimscroll.js',
    'resources/js/theme/sidebarmenu.js',
    'resources/js/theme/sticky-kit.js',
    'resources/js/theme/scripts.js'
],'public/js/theme.js');

mix.combine([

    'resources/assets/js/vendor/pace.js',
    'resources/assets/js/vendor/chart.js',
    'resources/assets/js/vendor/select2.js',
    'resources/assets/js/vendor/dropzone.js',
    'resources/assets/js/vendor/fastclick.js',
    'resources/assets/js/vendor/lightbox.js',
    'resources/assets/js/vendor/summernote-bs4.js',
    'resources/assets/js/vendor/jquery.nestable.js',
    'resources/assets/js/vendor/jquery.cookie.js',
    'resources/assets/js/vendor/cropper.js',

    'resources/assets/js/vendor/jquery.fancybox.min.js',
    'resources/assets/js/vendor/lazysizes.min.js',
    // 'resources/assets/js/vendor/owl.carousel.min.js',

    'resources/assets/js/vendor/moment.js',
    'resources/assets/js/vendor/daterangepicker.js',
    // 'resources/assets/js/vendor/bootstrap-datetimepicker.js',
    'node_modules/moment/locale/ar-sa.js',
    'node_modules/moment/locale/ar.js',
    'node_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js',
    'resources/assets/js/vendor/jquery.dataTables.js',
    'resources/assets/js/vendor/datatables.bootstrap.js',
    'resources/assets/js/vendor/datatables.responsive.js',

    'resources/js/dashboard/ironside.js',
    'resources/js/dashboard/buttons.js',
    'resources/js/dashboard/notify.js',
    'resources/js/dashboard/alerts.js',
    'resources/js/dashboard/notifications.js',
    'resources/js/dashboard/forms.js',
    'resources/js/dashboard/social_media.js',
    'resources/js/dashboard/datatables.js',
    'resources/js/dashboard/pagination.js',
    'resources/js/dashboard/google_maps.js',
    'resources/js/dashboard/utils.js',
    // Init The Dashboard
    'resources/js/dashboard.js',
],'public/js/dashboard.js');


mix.styles([
    '~bootstrap//bootstrap/dist/css/bootstrap.css',
    'resources/assets/css/vendor.css',
    'resources/assets/css/vendor/animate.css',
    'resources/assets/css/vendor/fancybox.css',
    'resources/assets/css/vendor/font-awesome.css',
    'resources/assets/css/vendor/jquery.fancybox.css',

    'resources/assets/css/website/faq.css',
    'resources/assets/css/website/colors.css',
    'resources/assets/css/website/pricing.css',
    'resources/assets/css/website/utilities.css',
    'resources/assets/css/website/testimonials.css',

    'resources/assets/css/website/website.css',
],'public/css/website.css');

// website javascripts
mix.scripts([
    '~jquery/dist/jquery.min.js',
    'resources/assets/js/vendor/popper.js', // bootstrap dependency
    '~bootstrap//bootstrap/dist/js/bootstrap.js',

    'resources/assets/js/vendor/jquery.fancybox.min.js',
    'resources/assets/js/vendor/lazysizes.min.js',
    //pathJS + 'vendor/owl.carousel.min.js',

    'resources/js/dashboard/ironside.js',
    'resources/js/dashboard/buttons.js',
    'resources/js/dashboard/notify.js',
    'resources/js/dashboard/alerts.js',
    'resources/js/dashboard/notifications.js',
    'resources/js/dashboard/forms.js',
    'resources/js/dashboard/social_media.js',
    'resources/js/dashboard/datatables.js',
    'resources/js/dashboard/pagination.js',
    'resources/js/dashboard/google_maps.js',
    'resources/js/dashboard/utils.js',

    'resources/assets/js/website.js',
],'public/js/website.js');

mix.copy('resources/assets/lang','public/lang')
if(mix.inProduction()) {
    mix.version();
}
