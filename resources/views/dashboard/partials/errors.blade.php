@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>{{ trans('dashboard/general.whoops') }}</strong>
        <ul style="list-style: outside none none; padding: 0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif