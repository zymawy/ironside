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

var COMPILE = 'all';
var public = 'public';
var pathBase = 'resources/assets';

if (COMPILE == 'all') {
    var path = pathBase + '/'

    // copy all the fonts
    //mix.copy(pathBase +  '/fonts', public + '/fonts');

    // copy all the sound
    // mix.copy(pathBase + '/sounds', public + '/sounds');


}

// website assets
if (COMPILE == 'website' || COMPILE == 'all') {


    // mix.sass('resources/assets/sass/vendor.scss', pathCSS)
    //     .setPublicPath('resources');





}

// admin assets
if (COMPILE == 'admin' || COMPILE == 'all') {

    var path = pathBase + '/';
    var pathCSS = path + '/admin/css/';
    var pathJS = path + '/admin/js/';

    var path = pathBase + '/admin/';

    // copy all the images
    //mix.copy(pathBase + '/images', public + '/images');

    mix.copy(pathCSS + 'lib/calendar2/themes/basic/fonts', public + '/fonts');
    mix.copy(pathCSS + 'lib/calendar2/themes/default/fonts', public + '/fonts');
    mix.copy(pathCSS + 'lib/calendar2/themes/default/images', public + '/images');
    mix.copy(pathCSS + 'lib/calendar2/themes/github/fonts', public + '/fonts');
    mix.copy(pathCSS + 'lib/calendar2/themes/material/fonts', public + '/fonts');

    // Icons
    mix.copy(pathBase + '/admin/icons', public + '/icons');
    // copy all the images
    mix.copy(path + 'images', public + '/images/admin');
    //style
    mix.styles([
        pathCSS + 'style.css',
    ], public + '/css/admin/style.css')
    //animate
    mix.styles([
        pathCSS + 'animate.css',
    ], public + '/css/admin/animate.css')
    //helper
    mix.styles([
        pathCSS + 'helper.css',
    ], public + '/css/admin/helper.css')
    //spinners
    mix.styles([
        pathCSS + 'spinners.css',
    ], public + '/css/admin/spinners.css')
    //spinners
    mix.styles([
        //-- Bootstrap Assets...
        pathCSS + 'lib/bootstrap/bootstrap.min.css',
    ], public + '/css/admin/bootstrap.css')
    //semantic
    mix.styles([
        //-- Calendar2 Assets...
        pathCSS + 'lib/calendar2/semantic.ui.min.css',
        pathCSS + 'lib/calendar2/pignose.calendar.min.css',
    ], public + '/css/admin/calendar2.css')
    //carousel
    mix.styles([
        //-- carousel Assets...
        pathCSS + 'lib/owl.carousel.min.css',
        pathCSS + 'lib/owl.theme.default.min.css',
    ], public + '/css/admin/carousel.css')

    mix.styles([

        // Include All From Lib Folder...


        //-- Amchart Assets...
        pathCSS + 'lib/amchart/export.css',
        //-- BarRating Assets...
        pathCSS + 'lib/barRating/barRating.css',
        //-- c3 Assets...
        pathCSS + 'lib/c3/c3.min.css',
        //-- Calendar Assets...
        pathCSS + 'lib/calendar/fullcalendar.css',

        //-- Chartist Assets...
        pathCSS + 'lib/chartist/chartist.min.css',
        //-- Data-Table Assets...
        pathCSS + 'lib/data-table/dataTables.bootstrap.min.css',
        pathCSS + 'lib/data-table/buttons.dataTables.min.css',
        pathCSS + 'lib/data-table/buttons.bootstrap.min.css',
        //-- DatePicker Assets...
        pathCSS + 'lib/datepicker/bootstrap-datepicker3.min.css',
        //-- Dropzone Assets...
        pathCSS + 'lib/dropzone/dropzone.css',
        //-- Html5-Editor Assets...
        pathCSS + 'lib/html5-editor/bootstrap-wysihtml5.css',
        //-- JsGrid Assets...
        pathCSS + 'lib/jsgrid/jsgrid.min.css',
        pathCSS + 'lib/jsgrid/jsgrid-theme.min.css',
        //-- Line-Progress Assets...
        pathCSS + 'lib/line-progress/jquery.lineProgressbar.css',
        //-- Lobi-Panel Assets...
        pathCSS + 'lib/lobi-panel/lobipanel.min.css',
        //-- Menubar Assets...
        pathCSS + 'lib/menubar/sidebar.css',
        //-- Metismenu Assets...
        pathCSS + 'lib/metismenu/menu.css',
        //-- Nestable Assets...
        pathCSS + 'lib/nestable/nestable.css',
        //-- Preloader Assets...
        pathCSS + 'lib/preloader/pace.css',
        //-- RangSlider Assets...
        pathCSS + 'lib/rangSlider/ion.rangeSlider.css',
        pathCSS + 'lib/rangSlider/ion.rangeSlider.skinFlat.css',
        pathCSS + 'lib/rangSlider/ion.rangeSlider.skinHTML5.css',
        pathCSS + 'lib/rangSlider/ion.rangeSlider.skinModern.css',
        pathCSS + 'lib/rangSlider/ion.rangeSlider.skinNice.css',
        pathCSS + 'lib/rangSlider/ion.rangeSlider.skinSimple.css',
        pathCSS + 'lib/rangSlider/normalize.css',

        //-- Rickshaw-Chart Assets...
        pathCSS + 'lib/rickshaw-chart/rickshaw.min.css',
        //-- Scrollable Assets...
        pathCSS + 'lib/scrollable/scrollable.min.css',
        //-- Select2 Assets...
        pathCSS + 'lib/select2/select2.min.css',
        //-- SweetAlert Assets...
        pathCSS + 'lib/sweetalert/sweetalert.css',
        //-- Toastr Assets...
        pathCSS + 'lib/toastr/toastr.min.css',
        //-- Vector-Map Assets...
        pathCSS + 'lib/vector-map/jqvmap.min.css',

    ], public + '/css/admin/admin.css');

    var pathJS = path + '/js/';
    // admin javascripts

    mix.scripts([
         // jquery
        pathJS + 'lib/jquery/jquery.min.js',
    ], public + '/js/admin/jquery.js')

    mix.scripts([
        // bootstrap
        pathJS + 'lib/bootstrap/popper.min.js',
        pathJS + 'lib/bootstrap/bootstrap.min.js',
    ], public + '/js/admin/bootstrap.js')

    mix.scripts([
        // slimscroll
        pathJS + 'jquery.slimscroll.js',
    ], public + '/js/admin/slimscroll.js')

    mix.scripts([
        // sidebarmenu
        pathJS + 'sidebarmenu.js',
    ], public + '/js/admin/sidebarmenu.js')

    mix.scripts([
        // sidebarmenu
        pathJS + 'scripts.js',
    ], public + '/js/admin/scripts.js')

    mix.scripts([
        //sticky-kit-master
        pathJS + 'lib/sticky-kit-master/dist/sticky-kit.min.js',
    ], public + '/js/admin/sticky-kit.js')

    mix.scripts([
        //morris-chart
        pathJS + 'lib/morris-chart/raphael-min.js',
        pathJS + 'lib/morris-chart/morris.js',
        pathJS + 'lib/morris-chart/dashboard1-init.js',
    ], public + '/js/admin/morris-chart.js')

    mix.scripts([
        //calendar-2
        pathJS + 'lib/calendar-2/moment.latest.min.js',
        pathJS + 'lib/calendar-2/semantic.ui.min.js',
        pathJS + 'lib/calendar-2/prism.min.js',
        pathJS + 'lib/calendar-2/pignose.calendar.min.js',
        pathJS + 'lib/calendar-2/pignose.init.js',
    ], public + '/js/admin/calendar-2.js')

    mix.scripts([
        //owl-carousel
        pathJS + 'lib/owl-carousel/owl.carousel.min.js',
        pathJS + 'lib/owl-carousel/owl.carousel-init.js',
    ], public + '/js/admin/owl-carousel.js')

    mix.scripts([

        pathJS + 'scripts.js',


        pathJS + 'lib/jquery.nicescroll/jquery.nicescroll.min.js',
        pathJS + 'lib/jquery-ui/jquery-ui.min.js',
        pathJS + 'lib/jquery-ui/jquery.ui.touch-punch.min.js',




        //barRating
        pathJS + 'lib/barRating/barRating.init.js',
        pathJS + 'lib/barRating/jquery.barrating.js',
        //barRating
        pathJS + 'lib/barRating/barRating.init.js',
        pathJS + 'lib/barRating/jquery.barrating.js',
        //c3
        pathJS + 'lib/c3/c3-init.js',
        pathJS + 'lib/c3/c3.min.js',
        pathJS + 'lib/c3/d3.min.js',
        //calendar
        pathJS + 'lib/calendar/fullcalendar-init.js',
        pathJS + 'lib/calendar/fullcalendar.min.js',


        //chart-amchart
        pathJS + 'lib/chart-amchart/amchart-init.js',
        pathJS + 'lib/chart-amchart/amcharts.js',
        pathJS + 'lib/chart-amchart/ammap.js',
        pathJS + 'lib/chart-amchart/amstock.js',
        pathJS + 'lib/chart-amchart/export.min.js',
        pathJS + 'lib/chart-amchart/light.js',
        pathJS + 'lib/chart-amchart/pie.js',
        pathJS + 'lib/chart-amchart/serial.js',
        pathJS + 'lib/chart-amchart/worldLow.js',

        //chartist
        pathJS + 'lib/chartist/chartist-init.js',
        pathJS + 'lib/chartist/chartist.min.js',
        pathJS + 'lib/chartist/chartist-plugin-tooltip.min.js',
        //chart-js
        pathJS + 'lib/chart-js/chartjs-init.js',
        pathJS + 'lib/chart-js/Chart.bundle.js',

        //chat-widget
        pathJS + 'lib/chat-widget/chat-widget-init.js',
        //circle-progress
        pathJS + 'lib/circle-progress/circle-progress-init.js',
        pathJS + 'lib/circle-progress/circle-progress.min.js',
        //datamap
        pathJS + 'lib/datamap/datamap-init.js',
        pathJS + 'lib/datamap/d3.min.js',
        pathJS + 'lib/datamap/datamaps.world.min.js',
        pathJS + 'lib/datamap/topojson.js',

        //datatables
        pathJS + 'lib/datatables/datatables-init.js',
        pathJS + 'lib/datatables/datatables.min.js',
        pathJS + 'lib/datatables/cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js',
        pathJS + 'lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js',
        pathJS + 'lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js',
        pathJS + 'lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js',
        pathJS + 'lib/datatables/cdn.rawgit.com/google/code-prettify/master/loader/run_prettify2102.js',
        pathJS + 'lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js',
        pathJS + 'lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js',
        pathJS + 'lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js',
        pathJS + 'lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js',

        //datepicker
        pathJS + 'lib/datepicker/bootstrap-datepicker.min.js',
        //dropzone
        pathJS + 'lib/dropzone/dropzone.js',

        //easing
        pathJS + 'lib/easing/jquery.easing.min.js',
        pathJS + 'lib/easing/stepup-form-init.js',

        //echart
        pathJS + 'lib/echart/echarts-init.js',
        pathJS + 'lib/echart/dashboard1-init.js',
        pathJS + 'lib/echart/echarts.js',

        //flot-chart
        pathJS + 'lib/flot-chart/flot-chart-init.js',
        pathJS + 'lib/flot-chart/curvedLines.js',
        pathJS + 'lib/flot-chart/jquery.flot.categories.js',
        pathJS + 'lib/flot-chart/excanvas.min.js',
        pathJS + 'lib/flot-chart/jquery.flot.crosshair.js',
        pathJS + 'lib/flot-chart/jquery.flot.js',
        pathJS + 'lib/flot-chart/jquery.flot.pie.js',
        pathJS + 'lib/flot-chart/jquery.flot.resize.js',
        pathJS + 'lib/flot-chart/jquery.flot.stack.js',
        pathJS + 'lib/flot-chart/jquery.flot.threshold.js',
        pathJS + 'lib/flot-chart/jquery.flot.time.js',
        pathJS + 'lib/flot-chart/flot-tooltip/jquery.flot.tooltip.min.js',
        //form-validation
        pathJS + 'lib/form-validation/jquery.validate-init.js',
        pathJS + 'lib/form-validation/jquery.validate.min.js',
        pathJS + 'lib/form-validation/jquery.validate.unobtrusive.js',
        pathJS + 'lib/form-validation/jquery.validate.unobtrusive.min.js',

        //gmap
        pathJS + 'lib/gmap/gmap.init.js',
        pathJS + 'lib/gmap/gmapApi.js',
        pathJS + 'lib/gmap/gmaps.js',

        //google-chart
        pathJS + 'lib/google-chart/google-charts.init.js',
        pathJS + 'lib/google-chart/google-jsapi.js',
        //granim
        pathJS + 'lib/granim/granim-init.js',
        pathJS + 'lib/granim/granim.min.js',

        //highchart
        pathJS + 'lib/highchart/highcharts-init.js',
        pathJS + 'lib/highchart/highcharts-modules-exporting.js',
        pathJS + 'lib/highchart/highcharts.js',
        pathJS + 'lib/highchart/highcharts-more.js',
        //html5-editor
        pathJS + 'lib/html5-editor/wysihtml5-init.js',
        pathJS + 'lib/html5-editor/wysihtml5-0.3.0.js',
        pathJS + 'lib/html5-editor/bootstrap-wysihtml5.js',

        //jsgrid
        pathJS + 'lib/jsgrid/jsgrid-init.js',
        pathJS + 'lib/jsgrid/jsgrid.core.js',
        pathJS + 'lib/jsgrid/jsgrid.field.js',
        pathJS + 'lib/jsgrid/jsgrid.validation.js',
        pathJS + 'lib/jsgrid/jsgrid.field.js',
        pathJS + 'lib/jsgrid/db.js',
        pathJS + 'lib/jsgrid/jsgrid.load-indicator.js',
        pathJS + 'lib/jsgrid/jsgrid.load-strategies.js',
        pathJS + 'lib/jsgrid/jsgrid.sort-strategies.js',
        pathJS + 'lib/jsgrid/fields/jsgrid.field.checkbox.js',
        pathJS + 'lib/jsgrid/fields/jsgrid.field.control.js',
        pathJS + 'lib/jsgrid/fields/jsgrid.field.number.js',
        pathJS + 'lib/jsgrid/fields/jsgrid.field.select.js',
        pathJS + 'lib/jsgrid/fields/jsgrid.field.text.js',
        pathJS + 'lib/jsgrid/fields/jsgrid.field.textarea.js',

        //justgage
        pathJS + 'lib/justgage/justgage.init.js',
        pathJS + 'lib/justgage/justgage.js',
        pathJS + 'lib/justgage/raphael-min.js',

        //knob
        pathJS + 'lib/knob/jquery.knob.min.js',
        pathJS + 'lib/knob/knob.init.js',

        //line-progress
        pathJS + 'lib/line-progress/line-progress-init.js',
        pathJS + 'lib/line-progress/jquery.lineProgressbar.js',
        //menubar
        pathJS + 'lib/menubar/sidebar.js',
        //metismenu
        pathJS + 'lib/metismenu/metismenu.init.js',
        pathJS + 'lib/metismenu/metismenu.min.js',
        pathJS + 'lib/metismenu/jquery.slimscroll.js',
        //moment
        pathJS + 'lib/moment/moment.js',


        //nestable
        pathJS + 'lib/nestable/nestable.init.js',
        pathJS + 'lib/nestable/jquery.nestable.js',

        //peitychart
        pathJS + 'lib/peitychart/peitychart.init.js',
        pathJS + 'lib/peitychart/jquery.peity.min.js',
        //portlets
        pathJS + 'lib/portlets/portlets-init.js',
        pathJS + 'lib/portlets/portlets.js',
        //preloader
        pathJS + 'lib/preloader/pace.min.js',
        //rangeSlider
        pathJS + 'lib/rangeSlider/rangeslider.init.js',
        pathJS + 'lib/rangeSlider/ion.rangeSlider.min.js',
        pathJS + 'lib/rangeSlider/moment.js',
        pathJS + 'lib/rangeSlider/moment-with-locales.js',
        //rating1
        pathJS + 'lib/rating1/jRate.init.js',
        pathJS + 'lib/rating1/jRate.min.js',
        //rickshaw
        pathJS + 'lib/rickshaw/rickshaw-init.js',
        pathJS + 'lib/rickshaw/rickshaw.min.js',
        pathJS + 'lib/rickshaw/d3.min.js',
        pathJS + 'lib/rickshaw/d3.layout.min.js',
        //scrollable
        pathJS + 'lib/scrollable/scrollable.init.js',
        pathJS + 'lib/scrollable/jquery-asScrollable.min.js',
        pathJS + 'lib/scrollable/holder.js',

        //select2
        pathJS + 'lib/select2/select2.full.min.js',
        //sparklinechart
        pathJS + 'lib/sparklinechart/sparkline.init.js',
        pathJS + 'lib/sparklinechart/jquery.sparkline.min.js',


        //sweetalert
        pathJS + 'lib/sweetalert/sweetalert.init.js',
        pathJS + 'lib/sweetalert/sweetalert.min.js',

        //toastr
        pathJS + 'lib/toastr/toastr.init.js',
        pathJS + 'lib/toastr/toastr.min.js',
        //vector-map
        pathJS + 'lib/vector-map/vector.init.js',
        pathJS + 'lib/vector-map/jquery.vmap.min.js',
        pathJS + 'lib/vector-map/jquery.vmap.sampledata.js',
        pathJS + 'lib/vector-map/country/jquery.vmap.world.js',
        //weather
        pathJS + 'lib/weather/weather-init.js',
        pathJS + 'lib/weather/jquery.simpleWeather.min.js',


    ], public + '/js/admin.js');
}

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');
