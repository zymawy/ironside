@if($paginator->total() > 0)
    {{--<style>--}}
        {{--.js-pagination-loader {--}}
            {{--display: none;--}}
        {{--}--}}
    {{--</style>--}}

    <div class="row paginator-footer">
        <div class="col-md-12">
            <p class="text-center">
                {{ trans('dashboard/general.showing') }}
                <strong>{{ (($paginator->currentPage() - 1) * $paginator->perPage()) + 1 }}</strong>
                {{ trans('dashboard/general.to') }}
                <strong>{{ $paginator->perPage() * $paginator->currentPage() > $paginator->total()? $paginator->total() : $paginator->perPage() * $paginator->currentPage() }}</strong>
                {{ trans('dashboard/general.of') }}
                <strong><span class="text-primary">{{ $paginator->total() }}</span></strong>
                {{ trans('dashboard/general.entries') }}
                @if(isset($paginator->originalEntries) && $paginator->originalEntries != $paginator->total())
                    <span class="text-muted">
                        ({{ __('dashboard/indexes.filtered_from') }}
                        <strong>{{ $paginator->originalEntries }}</strong>
                        {{ __('dashboard/indexes.total_entries') }})
                    </span>
                @endif
            </p>
        </div>

        <div class="col-md-12 text-center">
            {{ $paginator->links() }}
        </div>
    </div>

    {{--<div class="js-pagination-loader text-primary text-center">--}}
        {{--<i class="fa fa-spinner fa-spin fa-2x"></i>--}}
    {{--</div>--}}
@endif