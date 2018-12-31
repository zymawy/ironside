<!-- header header  -->
<div class="header">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <!-- Logo icon -->
                {{--<b><img src="/images/logo-for.png"--}}
                        {{--width="120"--}}
                        {{--height="13"--}}
                        {{--alt="Logo" class="dark-logo"/></b>--}}
                <!--End Logo icon -->
                <!-- Logo text -->
                <span><img src="/images/logo-text.png" alt="homepage" class="dark-logo"/></span>
            </a>
        </div>
        <!-- End Logo -->
        <div class="navbar-collapse justify-content-end">
            <!-- toggle and nav items -->
            <ul class="{!! !App::isLocale('ar')? "mr-auto" : "" !!} navbar-nav mt-md-0">
                <li class="nav-item">
                    <a class="nav-link nav-toggler hidden-md-up text-muted"
                       href="javascript:void(0)">
                        <i class="mdi mdi-menu"></i>
                    </a>
                </li>
                <li class="nav-item m-l-10">
                    <a class="nav-link sidebartoggler hidden-sm-down text-muted"
                       href="javascript:void(0)">
                        <i class="ti-menu"></i>
                    </a>
                </li>
                <li class="nav-item dropdown mega-dropdown">
                    <a class="nav-link dropdown-toggle text-muted"
                       href="#"
                       data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <i class="fa fa-th-large"></i>
                    </a>
                    <div class="dropdown-menu animated zoomIn">
                        <ul class="mega-dropdown-menu row">
                            <li class="col-lg-3  m-b-30">
                                <h4 class="m-b-20">
                                    @lang('dashboard.header.contuctus')
                                </h4>
                            </li>
                            <li class="col-lg-3 col-xlg-3 m-b-30">
                                <h4 class="m-b-20">@lang('dashboard.header.liststyle')</h4>
                                جاري
                            </li>
                            <li class="col-lg-3 col-xlg-3 m-b-30">
                                <h4 class="m-b-20">@lang('dashboard.header.liststyle')</h4>
                                <!-- List style -->
                                <ul class="list-style-none">
                                    جاري
                                </ul>
                            </li>
                            <li class="col-lg-3 col-xlg-3 m-b-30">
                                <h4 class="m-b-20">@lang('dashboard.header.liststyle')</h4>
                                <!-- List style -->
                                <ul class="list-style-none">
                                    جاري
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <!-- User profile and search -->
            <ul class="{!! App::isLocale('ar')? "mr-auto" : "" !!} navbar-nav my-lg-0">
                <!-- Search -->
                <li class="nav-item hidden-sm-down search-box">
                    <a class="nav-link hidden-sm-down text-muted" href="javascript:void(0)">
                        <i class="ti-search"></i>
                    </a>
                    <form class="app-search">
                        <input type="text" class="form-control" placeholder="Search here">
                        <a class="srh-btn">
                            <i class="ti-close"></i>
                        </a>
                    </form>
                </li>
                <!-- Comment -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted text-muted"
                       data-type="activities"
                       href="#"
                       data-toggle="dropdown"
                       >
                        <i class="fa fa-bell"></i>
                        <div id="js-activities-show-heart" class="ir-notify" style="display: none">
                            <span class="heartbit"></span>
                            <span class="point"></span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                        <ul>
                            <li>
                                <div class="drop-title">
                                    {!! trans('dashboard/general.activities_count_message')  !!}
                                </div>
                            </li>
                            <li>
                                <div class="message-center text-right" id="js-activities-list">

                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="/dashboard/history/website">
                                    <strong>
                                        {{ trans('dashboard/general.see_all_activities') }}
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
                    <a
                            class="nav-link dropdown-toggle text-muted"
                            id="js-notifications"
                            href="#"
                            {{--data-toggle="dropdown"--}}
                            data-toggle="modal"
                            data-target="#modal-notifications"
                            aria-haspopup="true"
                            aria-expanded="false">
                        <i class="fa fa-envelope"></i>
                        <div id="js-notifications-badge" data-user="{{ user()->id }}" style="display: none"></div>
                        <div id="js-notifications-show-heart" class="ir-notify" style="display: none">
                            <span class="heartbit"></span> <span class="point"></span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn" aria-labelledby="2">
                        <ul>
                            <li>

                            </li>
                            <li class="footer"><a href="/dashboard/history/website">See All Activities</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Messages -->
                {{--@if (impersonate()->isActive())--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('impersonate.logout') }}"--}}
                           {{--onclick="event.preventDefault(); document.getElementById('impersonate-logout-form').submit();">--}}
                            {{--Return to original user--}}
                        {{--</a>--}}

                        {{--<form id="impersonate-logout-form" action="{{ route('impersonate.logout') }}" method="post"--}}
                              {{--style="display: none;">--}}
                            {{--{{ csrf_field() }}--}}
                        {{--</form>--}}
                    {{--</li>--}}
            {{--@endif--}}
            <!-- Profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <img src="/images/1.png" alt="user"
                             class="profile-pic"
                        />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                        <ul class="dropdown-user">
                            <li><a href="{{ url('/dashboard/profile') }}"><i class="ti-user"></i> Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li><a href="#"><i class="ti-settings"></i> Setting</a></li>
                            <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Change Langauges -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <i class="ti-world"></i>
                        <i class="">{{ Localizer::getLanguage() }}</i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lang dropdown-menu-right animated zoomIn">
                        <ul class="dropdown-lang">
                            <li>@lang('ironside::dashboard/general.setlang')</li>
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
            </ul>
        </div>
    </nav>
</div>
<!-- End header header -->
