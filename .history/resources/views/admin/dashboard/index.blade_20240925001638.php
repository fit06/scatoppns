@extends('admin.layouts.app')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row d-flex justify-content-between">
                        <div class="card-title">Main Menu</div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        @if($button_1->status == 0)
                            <img src="{{ url('images/switch.png') }}" width="100">
                        @elseif($button_1->status == 1)
                            <img src="{{ url('images/shutdown.png') }}" width="100">
                        @endif
                        <a href="{{ route(Auth::user()->role.'.button_1') }}" class="btn btn-success text-uppercase align-content-center">Start</a>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        @if($button_2->status == 0)
                            <img src="{{ url('images/switch.png') }}" width="100">
                        @elseif($button_2->status == 1)
                            <img src="{{ url('images/power-on.png') }}" width="100">
                        @endif
                        <a href="{{ route(Auth::user()->role.'.button_2') }}" class="btn btn-danger text-uppercase align-content-center">Stop</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Total Production</div>

                    </div>
                </div>
                <div class="card-body">
                    <h2 class="text-center">{{ $totalproduction->value }}</h2>
                    <a href="{{ route(Auth::user()->role.'.reset') }}" class="btn btn-primary d-block">Reset</a>
                </div>
            </div>
        </div>

    </div>
@endsection
