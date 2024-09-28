@extends('admin.layouts.app')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Conveyor</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['method' => 'post', 'route' => [Auth::user()->role.'.conveyor.store'], 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            <label for="">Menu</label>
                            <select name="menu" class="form-control">
                                <option value="">- Pilih -</option>
                                @foreach($menu as $key => $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            <i class="text-danger">{{ $errors->first('menu') }}</i>
                        </div>
                        <div class="form-group">
                            <label for="">Input</label>
                            <input type="text" name="input" class="form-control" value="{{ old('input') }}" placeholder="Input" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('input') }}</i>
                        </div>
                        <div class="form-group">
                            <label for="">Kode</label>
                            <input type="text" name="kode" class="form-control" value="{{ old('kode') }}" placeholder="Kode" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('kode') }}</i>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route(Auth::user()->role.'.conveyor') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
