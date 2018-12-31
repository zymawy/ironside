{{--{!! DD($pagecrumb) !!}--}}

{{--{!! $breadcrumb !!}--}}
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 {{App::isLocale('ar')? 'text-right': 'text-left'}}">
        {!! $pagecrumb !!}
    </div>
    <div class="col-md-7 ">
        {!! $breadcrumb !!}
    </div>
</div>
<!-- End Bread crumb -->
