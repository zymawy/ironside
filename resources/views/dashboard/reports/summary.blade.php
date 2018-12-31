@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary" id="box-main-chart">
                <div class="card-header bg-primary with-border">
                    <h3 class="card-title text-white">
                        <span><i class="fa fa-bar-chart"></i></span>
                        <span>Summaries</span>
                    </h3>
                </div>

                <div class="card-body">

                    @include('DH::partials.info')

                    <table class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                        <tr>
                            <th data-class="expand">Description</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{!! $item[0] !!}</td>
                                <td>{!! $item[1] !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection