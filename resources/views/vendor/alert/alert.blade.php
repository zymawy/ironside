@if (session('alert.title'))
    <div class="notification is-{{ session('alert.level') }}" dir="rtl">
        @if (session('alert.close'))
            <button class="delete"></button>
        @endif
        @if (session('alert.icon'))
            <i class="fa-fw fa fa-{{ session('alert.icon') }}"></i>
        @endif
        <strong>{{ session('alert.title') }}</strong>
        {!! session('alert.content') !!}
    </div>
@endif

@section('scripts')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function () {
            // fade out alert after 5sec
            @if (session('alert.title'))
                setTimeout(function() {
                    $(".notification").fadeTo(2000, 0).slideUp(500, function(){
                        $(this).removeClass('in').removeClass('show').addClass('hide');
                    });
                }, 5000);
            @endif
        })
    </script>
@endsection