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

    'resources/js/dashboard/vendor/pace.js',
    'resources/js/dashboard/vendor/chart.js',
    'resources/js/dashboard/vendor/select2.js',
    'resources/js/dashboard/vendor/dropzone.js',
    'resources/js/dashboard/vendor/fastclick.js',
    'resources/js/dashboard/vendor/lightbox.js',
    'resources/js/dashboard/vendor/summernote-bs4.js',
    'resources/js/dashboard/vendor/jquery.nestable.js',
    'resources/js/dashboard/vendor/jquery.cookie.js',
    'resources/js/dashboard/vendor/cropper.js',

    'resources/js/dashboard/vendor/jquery.fancybox.min.js',
    'resources/js/dashboard/vendor/lazysizes.min.js',
    'resources/js/dashboard/vendor/owl.carousel.min.js',

    'resources/js/dashboard/vendor/moment.js',
    'resources/js/dashboard/vendor/daterangepicker.js',
    'resources/js/dashboard/vendor/bootstrap-datetimepicker.js',

    'resources/js/dashboard/vendor/jquery.dataTables.js',
    'resources/js/dashboard/vendor/datatables.bootstrap.js',
    'resources/js/dashboard/vendor/datatables.responsive.js',

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


mix.copy()
mix.version();