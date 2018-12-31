<div class="form-footer">
    @if(isset($submit) == false || $submit == true)
        <button class="btn bttn-material-flat bttn-primary btn-submit">
            <span class="badge"><i class="fa fa-fw fa-save"></i></span>{{ trans('dashboard/general.submit') }}
        </button>
    @endif

    <a href="javascript:window.history.back();" class="btn bttn-material-flat bttn-success">
        <span class="badge"><i class="fa fa-fw fa-chevron-left"></i></span>{{ trans('dashboard/general.back') }}
    </a>
</div>