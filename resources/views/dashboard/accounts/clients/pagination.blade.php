<div class="table-responsive">
<table class="table-pagination display nowrap table" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>
            {{ trans('dashboard/indexes.full_name') }}
        </th>
        <th>
            {{ trans('dashboard/indexes.cell_phone') }}
        </th>
        <th>
            {{ trans('dashboard/indexes.email') }}
        </th>
        <th>
            {{ trans('dashboard/indexes.roles') }}
        </th>
        <th>{{ trans('dashboard/indexes.action') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($paginator as $item)
        <tr>
            <td>{{ $item->firstname . ' '. $item->lastname }}</td>
            <td>{{ $item->cellphone }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->roles_string }}</td>
            <td>
                @if (!$item->confirmed_at)
                    <div class="btn-group">
                        <form method="POST" action="/dashboard/accounts/clients/{{$item->id}}/confirmed_at">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-dark btn-xs" data-toggle="tooltip"
                                    title="{{trans('dashboard/indexes.confirm') . $item->fullname }}">
                                <i class="fa fa-check"></i>
                            </button>
                        </form>
                        <a href="" class=""
                           data-toggle="tooltip" title="">

                        </a>
                    </div>
                @endif


                <div class="btn-group">
                    <a href="/dashboard/accounts/clients/{{$item->id}}"
                       class="btn bttn-material-flat bttn-xs bttn-default" data-toggle="tooltip"
                       title="{{trans('dashboard/indexes.show') . $item->fullname}}">
                        <i class="fa fa-eye"></i>
                    </a>
                </div>

                <div class="btn-group">
                    <a href="/dashboard/accounts/clients/{{$item->id}}/edit"
                       class="btn bttn-material-flat bttn-xs bttn-primary" data-toggle="tooltip"
                       title="{{trans('dashboard/indexes.edit') . $item->fullname }}">
                        <i class="fa fa-edit"></i>
                    </a>
                </div>
                <div class="btn-group">
                    <form id="form-delete-row{{ $item->id }}" method="POST"
                          action="/dashboard/accounts/clients/{{ $item->id }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input name="_id" type="hidden" value="{{ $item->id }}">
                        <a data-form="form-delete-row{{ $item->id }}"
                           class="btn bttn-material-flat bttn-xs bttn-danger btn-delete-row text-white"
                           data-toggle="tooltip" title="{{trans('dashboard/indexes.delete') . $item->fullname }}">
                            <i class="fa fa-trash"></i>
                        </a>
                    </form>
                </div>

                @if ($item->confirmed_at)
                    <div class="btn-group">
                        <form id="impersonate-login-form-{{$item->id}}"
                              action="{{route('impersonate.login', $item->id)}}" method="post">
                            <input name="_token" type="hidden" value="{{csrf_token()}}">
                            <input name="redirect_to" type="hidden" value="/{{$item->logged_in_as}}">
                            <a data-form="impersonate-login-form-{{$item->id}}"
                               class="btn bttn-material-flat bttn-xs bttn-warning btn-confirm-modal-row text-white"
                               data-toggle="tooltip"
                               title="{{trans('dashboard/indexes.impersonate') . $item->fullname }}">
                                <i class="fa fa-user-secret"></i>
                            </a>
                        </form>
                    </div>
                @endif

                <div class="btn-group">
                    <span class="bttn-material-flat label label-{{ $item->confirmed_at ? 'success':'warning' }}">
                        {{ $item->confirmed_at ?  trans('dashboard/indexes.confirmed') . $item->confirmed_at->format('d M Y') : trans('dashboard/indexes.confirmed_yat') }}
                    </span>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

@include('DH::partials.pagination_footer')
