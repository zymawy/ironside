@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary box-solid">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title">
                        <span><i class="fa fa-eye"></i></span>
                        <span>Pages - {{ $item->name }}</span>
                    </h3>
                </div>

                <div class="card-body no-padding">

                    @include('DH::partials.info')

                    <form>
						<fieldset>
							<div class="row">
								<section class="col col-6">
									<section class="form-group">
										<label>Page</label>
										<input type="text" class="form-control" value="{{ $item->name }}" readonly>
									</section>
								</section>

								<section class="col col-6">
									<section class="form-group">
										<label>Slug</label>
										<input type="text" class="form-control" value="{{ $item->slug }}" readonly>
									</section>
								</section>
							</div>

							<section class="form-group">
								<label>Description</label>
								<div class="well well-light well-form-description">
									{!! $item->description !!}
								</div>
							</section>
						</fieldset>

                    	@include('DH::partials.form_footer', ['submit' => false])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection