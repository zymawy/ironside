<li class="{{ array_search_value($nav->id, $selectedNavigationParents) ? 'active' : ''}}">
    <a {{ isset($navigation[$nav->id])? 'class="has-arrow"' : $nav->url }} href="{{ isset($navigation[$nav->id])? '#' : $nav->url }}" aria-expanded="false">
        <i class="fa fa-fw fa-{{ $nav->icon }}"></i>
        <span>{!! $nav->title !!}</span>
        @if (isset($navigation[$nav->id]))
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
        @endif
    </a>
</li>