@extends('admin.layouts.app')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Setting</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route(Auth::user()->role.'.settings', 'valve') }}" class="btn btn-primary d-block mt-2">Valve</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route(Auth::user()->role.'.settings', 'conveyor') }}" class="btn btn-primary d-block mt-2">Conveyor Speed</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection