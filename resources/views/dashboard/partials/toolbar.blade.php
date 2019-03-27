<div class="{{ App::isLocal('ar')? 'pull-right' : '' }}">
    <div class="well-toolbar" style="width: 18rem;">
        <a class="bttn-xs bttn-primary bttn-material-flat m-b-10 m-l-5" href="{{ Request::url().'/create' }}">
            <span class="badge"><i class="fa fa-fw fa-plus"></i></span>
            {{ trans('dashboard/general.create') }} {{ ucfirst($resource) }}
        </a>

        @if(isset($order) && $order === true)
            <a class="btn bttn-material-flat text-white b-ir-success m-b-10 m-l-5" href="{{ Request::url().'/order' }}">
                <span class="badge"><i class="fa fa-fw fa-align-center"></i></span>{{ ucfirst($resource) }} {{ trans('dashboard/general.order') }}
            </a>
        @endif
    </div>
</div>
