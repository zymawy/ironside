<h2 class="hidden">{{ trans('dashboard/general.header') }}</h2>
<header class="main-header">
    <h3 class="hidden">{{ trans('dashboard/general.logo') }}</h3>
    <a href="/" class="logo">
        <span class="logo-mini"><img src="/images/logo-mini.png" style="width: 100%;"/></span>
        <span class="logo-lg"><img src="/images/logo.png" style="width: 100%;"/></span>
    </a>

    <h3 class="hidden">{{ trans('dashboard/general.header-top-actions') }}</h3>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">{{ trans('dashboard/general.toggle-navigation') }}</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @if (impersonate()->isActive())
                    <li>
                        <a href="{{ route('impersonate.logout') }}"
                           onclick="event.preventDefault(); document.getElementById('impersonate-logout-form').submit();">
                            {{ trans('dashboard/general.return-to-original-user') }}
                        </a>

                        <form id="impersonate-logout-form" action="{{ route('impersonate.logout') }}" method="post" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif

                <li class="dropdown messages-menu">
                    <a id="js-notifications" href="#" class="dropdown-toggle" data-toggle="modal" data-target="#modal-notifications">
                        <i class="fa fa-envelope-o"></i>
                        <span data-user="{{ user()->id }}" id="js-notifications-badge" class="label label-success" style="display: none;"></span>
                    </a>
                </li>

                <li class="dropdown messages-menu">
                    <a data-type="activities" href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span id="js-activities-badge" class="label label-warning" style="display: none;"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <ul id="js-activities-list" class="menu">

                            </ul>
                        </li>
                        <li class="footer"><a href="/dashboard/history/website">{{ trans('dashboard/general.see-all-activities') }}</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ profile_image() }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{!! user()->fullname !!}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{ profile_image() }}" class="img-circle" alt="User Image">
                            <p>{{ trans('dashboard/general.member') }}
                                {!! user()->fullname !!}
                                <small>
                                    {{ trans('dashboard/general.since') }} {{ user()->created_at->format('d F Y') }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ url('/dashboard/profile') }}" class="btn btn-flat btn-default btn-flat">{{ trans('dashboard/general.profile') }}</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ trans('dashboard/general.sign-out') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>