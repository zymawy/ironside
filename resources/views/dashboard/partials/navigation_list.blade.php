@foreach ($collection as $nav)
    <li class="{{ array_search_value($nav->id, $selectedNavigationParents) ? 'active' : ''}}">
        <a
                {!!  $nav->children->count()? "class=has-arrow " : "" !!}
                href="{{ isset($navigation[$nav->id])? '#' : $nav->url }}"
                aria-expanded="false">

            {{--Change The Icon Algin To Look Cool--}}
                @if(App::isLocale('ar'))
                    <i class="fa fa-fw fa-{{ $nav->icon }}"></i>
                    <i class="hidden-lg-down fa fa-angle-left pull-right"></i>
                @else
                    <i class="fa fa-fw fa-{{ $nav->icon }}"></i>
                    <i class="hidden-lg-down fa fa-angle-right"></i>
                @endif
            <span>{!! $nav->title !!}</span>
           {{-- <pre>{!! dump($nav->title) !!}</pre> --}}
        </a>

        @if (isset($navigation[$nav->id]))
            <ul aria-expanded="false" class="collapse">
                @include ('DH::partials.navigation_list', ['collection' => $navigation[$nav->id],'changeIconAlign' => true])
            </ul>
        @endif
    </li>
@endforeach
