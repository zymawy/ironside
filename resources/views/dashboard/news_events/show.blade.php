@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-eye"></i></span>
                        <span>News - {{ $item->title }}</span>
                    </h3>
                </div>

                <div class="card-body no-padding">

                    @include('DH::partials.info')

                    <form>
                        <fieldset>
                            <div class="row">
                                <div class="col col-6">
                                    <section class="form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control" value="{{ $item->title }}" readonly>
                                    </section>
                                </div>

                                <div class="col col-6">
                                    <section class="form-group">
                                        <label>Slug</label>
                                        <input type="text" class="form-control" value="{{ $item->slug }}" readonly>
                                    </section>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Summary</label>
                                <input type="text" class="form-control" value="{{ $item->summary }}" readonly>
                            </div>

                            <div class="row">
                                <div class="col col-4">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <input type="text" class="form-control" value="{{ $item->category->name }}" readonly>
                                    </div>
                                </div>

                                <div class="col col-4">
                                    <div class="form-group">
                                        <label>Active From</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="{{ $item->active_from }}" readonly>
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col col-4">
                                    <div class="form-group">
                                        <label>Active To</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="{{ $item->active_to }}" readonly>
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <div class="well well-sm">
                                    {!! $item->content !!}
                                </div>
                            </div>

                            <div class="superbox">
                                @foreach($item->photos as $photo)
                                    <div class="superbox-list">
                                        <a href="{{ $photo->urlForName($photo->original) }}" data-lightbox="images" data-title="{{ $photo->name }}">
                                            <img src="{{ $photo->urlForName($photo->thumb) }}" title="{{ $photo->name }}" class="superbox-img">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </fieldset>

                        @include('DH::partials.form_footer', ['submit' => false])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection