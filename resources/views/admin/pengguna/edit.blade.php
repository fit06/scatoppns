@extends('admin.layouts.app')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Pengguna</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['method' => 'post', 'route' => [Auth::user()->role.'.pengguna.update', $pengguna->id], 'enctype' => 'multipart/form-data']) !!}
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $pengguna->name }}" placeholder="Nama" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('nama') }}</i>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $pengguna->email }}" placeholder="Email" autocomplete="off">
                            <i class="text-danger">{{ $errors->first('email') }}</i>
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <select name="role" class="form-control">
                                <option value="">- Pilih -</option>
                                @foreach($role as $key => $value)
                                    <option value="{{ $value }}" @if($value==$pengguna->role) selected @endif>{{ strtoupper($value) }}</option>
                                @endforeach
                            </select>
                            <i class="text-danger">{{ $errors->first('email') }}</i>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                            <i>* Isi jika ingin mengganti password.</i><br>
                            <i class="text-danger">{{ $errors->first('password') }}</i>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route(Auth::user()->role.'.pengguna') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection