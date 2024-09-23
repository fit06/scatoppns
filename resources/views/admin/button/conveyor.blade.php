@extends('admin.layouts.app')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Conveyor Speed</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="text-upperacase">Monitoring</h4>
                            @foreach($conveyor as $row)
                                @if($row->menu == 'Monitoring')
                                {!! Form::open(['method' => 'post', 'route' => [Auth::user()->role.'.settings.conveyor', $row->kode]]) !!}
                                <div class="form-group">
                                    <label for="">{{ $row->input }}</label>
                                    <input type="number" name="value" class="form-control" min="0" value="{{ $row->value }}">
                                </div>
                                {!! Form::close() !!}
                                @endif
                            @endforeach
                        </div>
                        {{-- <div class="col-md-4 text-center">
                            <br>
                            <br>
                            <h4 class="mt-2 text-uppercase">Valve 1</h4>
                            <h4 class="mt-2 text-uppercase">Valve 2</h4>
                            <h4 class="mt-2 text-uppercase">Valve 3</h4>
                            <h4 class="mt-2 text-uppercase">Valve 4</h4>
                        </div> --}}
                        <div class="col-md-4">
                            <h4 class="text-upperacase">Setting</h4>
                            @foreach($conveyor as $row)
                                @if($row->menu == 'Setting')
                                {!! Form::open(['method' => 'post', 'route' => [Auth::user()->role.'.settings.conveyor', $row->kode]]) !!}
                                    <div class="form-group">
                                        <label for="">{{ $row->input }}</label>
                                        <input type="number" name="value" class="form-control" min="0" value="{{ $row->value }}">
                                    </div>
                                {!! Form::close() !!}
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            <h4 class="text-upperacase">Production Plan</h4>
                            @foreach($conveyor as $row)
                                @if($row->menu == 'Production Plan')
                                {!! Form::open(['method' => 'post', 'route' => [Auth::user()->role.'.settings.conveyor', $row->kode]]) !!}
                                    <div class="form-group">
                                        <label for="">{{ $row->input }}</label>
                                        <input type="number" name="value" class="form-control" min="0" value="{{ $row->value }}">
                                    </div>
                                {!! Form::close() !!}
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <a href="{{ route(Auth::user()->role.'.settings', 'setting') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection