<!-- header header  -->
<div class="header">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <!-- Logo icon -->
                <b><img src="images/logo.png" alt="homepage" class="dark-logo" /></b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span><img src="images/logo-text.png" alt="homepage" class="dark-logo" /></span>
            </a>
        </div>
        <!-- End Logo -->
        <div class="navbar-collapse">
            <!-- toggle and nav items -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a>                    </li>
                <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a>                    </li>
                <!-- Messages -->
                <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
                    <div class="dropdown-menu animated zoomIn">
                        <ul class="mega-dropdown-menu row">


                            <li class="col-lg-3  m-b-30">
                                <h4 class="m-b-20">
                                     @lang('dashboard.header.contuctus')
                                 </h4>
                                <!-- Contact -->
                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name">                                        </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Enter email"> </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-info">
                                        @lang('dashboard.header.submit')
                                    </button>
                                </form>
                            </li>
                            <li class="col-lg-3 col-xlg-3 m-b-30">
                                <h4 class="m-b-20">@lang('dashboard.header.liststyle')</h4>
                                <!-- List style -->
                                <ul class="list-style-none">
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>@lang('dashboard.header.thisLink')</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>@lang('dashboard.header.thisLink')</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>@lang('dashboard.header.thisLink')</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>@lang('dashboard.header.thisLink')</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>@lang('dashboard.header.thisLink')</a></li>
                                </ul>
                            </li>
                            <li class="col-lg-3 col-xlg-3 m-b-30">
                                <h4 class="m-b-20">@lang('dashboard.header.liststyle')</h4>
                                <!-- List style -->
                                <ul class="list-style-none">
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>@lang('dashboard.header.thisLink')</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>@lang('dashboard.header.thisLink')</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>@lang('dashboard.header.thisLink')</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>@lang('dashboard.header.thisLink')</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>@lang('dashboard.header.thisLink')</a></li>
                                </ul>
                            </li>
                            <li class="col-lg-3 col-xlg-3 m-b-30">
                                <h4 class="m-b-20">@lang('dashboard.header.liststyle')</h4>
                                <!-- List style -->
                                <ul class="list-style-none">
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>@lang('dashboard.header.thisLink')</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>@lang('dashboard.header.thisLink')</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>@lang('dashboard.header.thisLink')</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>@lang('dashboard.header.thisLink')</a></li>
                                    <li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i>@lang('dashboard.header.thisLink')</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Messages -->
            </ul>
            <!-- User profile and search -->
            <ul class="navbar-nav my-lg-0">

                <!-- Search -->
                <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i class="ti-close"></i></a>                        </form>
                </li>
                <!-- Comment -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
								<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
							</a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                        <ul>
                            <li>
                                <div class="drop-title">
                                    @lang('dashboard.haeder.notifications')
                                </div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
                                        <div class="mail-contnet">
                                            <h5>This is title</h5> <span class="mail-desc">Just see the my new admin!</span>                                            <span class="time">9:30 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="btn btn-success btn-circle m-r-10"><i class="ti-calendar"></i></div>
                                        <div class="mail-contnet">
                                            <h5>
                                                @lang('dashboard.header.notifications-title')
                                            </h5>
                                            <span class="mail-desc">
                                                @lang('dashboard.header.notifications-body')
                                            </span>
                                            <span class="time">9:10 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="btn btn-info btn-circle m-r-10"><i class="ti-settings"></i></div>
                                        <div class="mail-contnet">
                                            <h5>
                                                @lang('dashboard.header.notifications-title-1')
                                            </h5>
                                            <span class="mail-desc">
                                                @lang('dashboard.header.notifications-body-1')
                                            </span>
                                            <span class="time">9:08 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="btn btn-primary btn-circle m-r-10"><i class="ti-user"></i></div>
                                        <div class="mail-contnet">
                                            <h5>
                                                @lang('dashboard.header.notifications-title')
                                            </h5>
                                            <span class="mail-desc">
                                                @lang('dashboard.header.notifications-body')
                                            </span>
                                            <span class="time">9:10 AM</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="javascript:void(0);">
                                    <strong>
                                        @lang('dashboard.header.notifications-checkAll')
                                    </strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Comment -->
                <!-- Messages -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted  " href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-envelope"></i>
								<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
							</a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                        <ul>
                            <li>
                                <div class="drop-title">
                                    @lang('dashboard.header.notifications-have')
                                </div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="user-img"> <img src="images/users/5.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span>                                            </div>
                                        <div class="mail-contnet">
                                            <h5>
                                                @lang('dashboard.header.notifications-title')
                                            </h5>
                                            <span class="mail-desc">
                                                @lang('dashboard.header.notifications-body')
                                            </span>
                                            <span class="time">9:10 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="user-img"> <img src="images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span>                                            </div>
                                        <div class="mail-contnet">
                                            <h5>
                                                @lang('dashboard.header.notifications-title')
                                            </h5>
                                            <span class="mail-desc">
                                                @lang('dashboard.header.notifications-body')
                                            </span>
                                            <span class="time">9:10 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="user-img"> <img src="images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span>                                            </div>
                                        <div class="mail-contnet">
                                            <h5>
                                                @lang('dashboard.header.notifications-title')
                                            </h5>
                                            <span class="mail-desc">
                                                @lang('dashboard.header.notifications-body')
                                            </span>
                                            <span class="time">9:10 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="#">
                                        <div class="user-img"> <img src="images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span>                                            </div>
                                        <div class="mail-contnet">
                                            <h5>
                                                @lang('dashboard.header.notifications-title')
                                            </h5>
                                            <span class="mail-desc">
                                                @lang('dashboard.header.notifications-body')
                                            </span>
                                            <span class="time">9:10 AM</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="javascript:void(0);">
                                    <strong>
                                        @lang('dashboard.header.email-see')
                                    </strong>
                                    <i class="fa fa-angle-right"></i>
                                 </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Messages -->
<!-- Change Langauges -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ti-world"></i>
                        <i class="">{{ Localizer::getLanguage() }}</i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lang dropdown-menu-right animated zoomIn">
                        <ul class="dropdown-lang">
                            <li>@lang('dashboard.header.setlang')</li>
                            @foreach (Localizer::allowedLanguages() as $code => $value)
                                <li>
                                    <a href="{{ Localizer::setRoute($code) }}">
                                    <i class="ti-world"></i> {{ $value }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <!-- Profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ Gravatar::get( auth()->user()->email ) }}" alt="user" class="profile-pic" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                        <ul class="dropdown-user">
                            <li><a href="#"><i class="ti-user"></i> Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li><a href="#"><i class="ti-settings"></i> Setting</a></li>
                            <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!-- End header header -->
