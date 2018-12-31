<nav class="navbar has-shadow" id="top" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        {{--<a class="navbar-item" href="https://bulma.io">--}}
            {{--<img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">--}}
        {{--</a>--}}

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="/">
                <img src="/images/meshal-logo.png" width="112" height="28">
            </a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <a class="nav-item is-tab">
                    <i class="fa fa-bell-o"></i>
                </a>

                @if (Auth::guest())
                    <a class="navbar-item  is-tab" href="{{ route('login') }}">تسجيل الدخول</a>
                    <a class="navbar-item  is-tab" href="{{ route('register') }}">
                        تسجيل
                    </a> @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link" href="#">
                                <img src="https://placehold.it/64x64" class="avatar-photo">
                             {{ Auth::user()->firstname }} 
                        </a>
                        <div class="navbar-dropdown is-right">
                            <a href="{{route('me')}}" class="navbar-item">
                                    <span class="icon">
                                      <i class="fa fa-fw fa-user m-r-5"></i>
                                    </span>البروفايل
                            </a>

                            <a href="/notification" class="navbar-item">
                                    <span class="icon">
                                      <i class="fa fa-fw fa-bell m-r-5"></i>
                                    </span>الاشعارات
                            </a>
                            <hr class="navbar-divider">
                            <a href="{{route('logout')}}" class="navbar-item" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                                {{ __('تسجيل الخروج') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>

@section('scripts')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function () {
            $('#form-search').on('submit', function () {
                var search = $("#form-search input[name='search']").val();
                window.location.href = "https://www.google.com.na/search?q={{ config('app.url') }}+" + encodeURI(search);
                return false;
            });
        })
    </script>
@endsection
