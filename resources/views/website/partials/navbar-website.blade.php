<header class="site-header">
    <div class="container">
        <div class="site-header-inner" dir="rtl">
            <div class="brand header-brand">
                <h1 class="m-0">
                    <a href="#">
                        <img src="/images/logo-32.png" alt="">
                    </a>
                </h1>
            </div>
            <ul class="header-links list-reset m-0">
                <!-- Authentication Links -->
                @guest
                    <li >
                        <a href="auth/login">
                            تسجيل الدخول
                        </a>
                    </li>
                    <li>
                        @if (Route::has('register'))
                            <a class="button button-sm button-shadow" href="auth/register">
                                تسجيل
                            </a>
                        @endif
                    </li>
                @else
                    <li>
                        <a role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div>

                            <a class="dropdown-item" href="{{ route('me') }}">
                                {{ __('بروفايلي') }}
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('تسجيل الخروج') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</header>