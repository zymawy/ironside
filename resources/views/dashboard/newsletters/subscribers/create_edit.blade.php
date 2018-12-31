@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary" id="box-main-chart">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-edit"></i></span>
                        <span>{{ isset($item)? __('dashboard/forms.edit_the') . $item->name . __('dashboard/forms.entry'): __('dashboard/forms.create_user_text_newsletter') }}</span>
                    </h3>
                </div>

                @include('DH::partials.info')

                <div class="card-body no-padding">

					<form method="POST" action="{{$selectedNavigation->url . (isset($item)? "/{$item->id}" : '')}}" accept-charset="UTF-8">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input name="_method" type="hidden" value="{{isset($item)? 'PUT':'POST'}}">

						<fieldset>
							<div class="row">
								<div class="col-md-6">
                                    <div class="form-group {{ form_error_class('fullname', $errors) }}">
                                        <label for="fullname">{{ __('dashboard/indexes.full_name') }}</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="{{ __('dashboard/indexes.full_name_placeholder') }}" value="{{ ($errors && $errors->any()? old('fullname') : (isset($item)? $item->fullname : '')) }}">
                                        {!! form_error_message('fullname', $errors) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('email', $errors) }}">
                                        <label for="email">{{ __('dashboard/forms.email') }}</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="{{ __('dashboard/forms.email_placeholder') }}" value="{{ ($errors && $errors->any()? old('email') : (isset($item)? $item->email : '')) }}">
                                        {!! form_error_message('email', $errors) !!}
                                    </div>
                                </div>
							</div>
						</fieldset>

						@include('DH::partials.form_footer')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection