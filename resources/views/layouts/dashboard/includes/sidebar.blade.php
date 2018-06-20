<!-- Left Sidebar  -->
<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">
                    @lang('dashboard.sidebar.home')
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard <span class="label label-rouded label-primary pull-right">2</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">
                           @lang('dashboard.sidebar.ecommerce')
                        </a></li>
                        <li><a href="#">
                            @lang('dashboard.sidebar.analytics')
                        </a></li>
                    </ul>
                </li>
                <li class="nav-label"> @lang('dashboard.sidebar.apps') </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-envelope"></i><span class="hide-menu">
                    @lang('dashboard.sidebar.email')
                    </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">@lang('dashboard.sidebar.compose')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.read')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.inbox')</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Charts</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">@lang('dashboard.sidebar.flot')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.morris')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.chartJs')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.chartist') </a></li>
                        <li><a href="#">@lang('dashboard.sidebar.amChart')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.eChart')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.sparkline')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.peity')</a></li>
                    </ul>
                </li>
                <li class="nav-label">@lang('dashboard.sidebar.features')</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Bootstrap UI <span class="label label-rouded label-warning pull-right">6</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">@lang('dashboard.sidebar.alert')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.button')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.dropdown')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.progressbar')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.tab')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.typography')</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-suitcase"></i><span class="hide-menu">Components <span class="label label-rouded label-danger pull-right">6</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">@lang('dashboard.sidebar.calender')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.datamap')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.nestedable')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.sweetalert')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.toastr')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.weather')</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Forms</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">@lang('dashboard.sidebar.basic-forms')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.form-layout')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.form-validation')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.editor')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.dropzone')</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">Tables</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">@lang('dashboard.sidebar.basic-tables')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.data-tables')</a></li>
                    </ul>
                </li>
                <li class="nav-label">@lang('dashboard.sidebar.layout')</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-columns"></i><span class="hide-menu">Layout</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="">@lang('dashboard.sidebar.blank')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.blank')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.boxed')</a></li>
                        <li><a href="#">@lang('dashboard.sidebar.data-tables')</a></li>
                    </ul>
                </li>
                <li class="nav-label">@lang('dashboard.sidebar.extra')</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Pages <span class="label label-rouded label-success pull-right">8</span></span></a>
                    <ul aria-expanded="false" class="collapse">

                        <li><a href="#" class="has-arrow"> @lang('dashboard.sidebar.auth') <span class="label label-rounded label-success">6</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">@lang('dashboard.sidebar.login')</a></li>
                                <li><a href="#">@lang('dashboard.sidebar.register')</a></li>
                                <li><a href="#">@lang('dashboard.sidebar.invoice')</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="has-arrow"></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="page-error-400.html">400</a></li>
                                <li><a href="page-error-403.html">403</a></li>
                                <li><a href="page-error-404.html">404</a></li>
                                <li><a href="page-error-500.html">500</a></li>
                                <li><a href="page-error-503.html">503</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-map-marker"></i><span class="hide-menu">Maps</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="map-google.html">Google</a></li>
                        <li><a href="map-vector.html">Vector</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-level-down"></i><span class="hide-menu">Multi level dd</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">item 1.1</a></li>
                        <li><a href="#">item 1.2</a></li>
                        <li> <a class="has-arrow" href="#" aria-expanded="false">Menu 1.3</a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="#">item 1.3.1</a></li>
                                <li><a href="#">item 1.3.2</a></li>
                                <li><a href="#">item 1.3.3</a></li>
                                <li><a href="#">item 1.3.4</a></li>
                            </ul>
                        </li>
                        <li><a href="#">item 1.4</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->
