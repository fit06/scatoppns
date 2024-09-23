@extends('admin.layouts.app')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Input Output</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['method' => 'post', 'route' => [Auth::user()->role.'.inputoutput.store'], 'enctype' => 'multipart/form-data']) !!}

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
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" placeholder="Nama" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('nama') }}</i>
                        </div>
                        <div class="form-group">
                            <label for="">Button</label>
                            <input type="text" name="button" class="form-control" value="{{ old('button') }}" placeholder="Button" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('button') }}</i>
                        </div>
                        <div class="form-group">
                            <label for="">Kode</label>
                            <input type="text" name="kode" class="form-control" value="{{ old('kode') }}" placeholder="Kode" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('kode') }}</i>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route(Auth::user()->role.'.inputoutput') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection