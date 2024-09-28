@extends('admin.layouts.app')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')

    <ul class="row" id="dashboardMenu" style="list-style: none">
        <li class="col-md-6">
            <div class="card card-round">
                <div class="card-header">
                    <div class="card-head-row d-flex justify-content-between">
                        <div class="card-title">Main Menu</div>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Option
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="#">Edit</a></li>
                              <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                          </div>
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
        </li>

        <li class="col-md-6">
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
        </li>

        <li class="col-md-6"></li>
        <li class="col-md-6"></li>
        <li class="col-md-6"></li>
        <li class="col-md-6"></li>

    </ul>
@endsection
