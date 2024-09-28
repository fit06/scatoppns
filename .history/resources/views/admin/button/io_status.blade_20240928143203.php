@extends('admin.layouts.app')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">I/O Status</h3>
        </div>
    </div>

    <div class="row" id="inputoutput">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <ul class="row" id="inputMenu" style="list-style: none">
                                @foreach($input as $row)
                                <li class="col-md-6">
                                    <div class="d-flex">
                                        @if($row->nama <> 'Emergency')
                                            @if($row->status == 0)
                                                <img src="{{ url('images/switch.png') }}" width="80" class="me-2">
                                            @elseif($row->status == 1)
                                                <img src="{{ url('images/shutdown.png') }}" width="80" class="me-2">
                                            @endif
                                        @else
                                            @if($row->status == 1)
                                                <img src="{{ url('images/switch.png') }}" width="80" class="me-2">
                                            @elseif($row->status == 0)
                                                <img src="{{ url('images/shutdown.png') }}" width="80" class="me-2">
                                            @endif
                                        @endif
                                        <h3 class="mt-2 pt-3">{{ $row->nama }}</h3>
                                    </div>
                                </li>
                                @endforeach
                                <li class="col-md-6" style="padding: 42px; background-color: rgba(0, 0, 0, 0); width: 100%"></li>
                                <li class="col-md-6" style="padding: 42px; background-color: rgba(0, 0, 0, 0); width: 100%"></li>
                                <li class="col-md-6" style="padding: 42px; background-color: rgba(0, 0, 0, 0); width: 100%"></li>
                                <li class="col-md-6" style="padding: 42px; background-color: rgba(0, 0, 0, 0); width: 100%"></li>
                                <li class="col-md-6" style="padding: 42px; background-color: rgba(0, 0, 0, 0); width: 100%"></li>
                                <li class="col-md-6" style="padding: 42px; background-color: rgba(0, 0, 0, 0); width: 100%"></li>
                                <li class="col-md-6" style="padding: 42px; background-color: rgba(0, 0, 0, 0); width: 100%"></li>
                                <li class="col-md-6" style="padding: 42px; background-color: rgba(0, 0, 0, 0); width: 100%"></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            @if(Request::segment(3)=='Input')
                                <a href="{{ route(Auth::user()->role.'.io_status', 'Input') }}" class="btn btn-success d-block disabled">Input</a>
                                <a href="{{ route(Auth::user()->role.'.io_status', 'Output') }}" class="btn btn-primary d-block mt-2">Output</a>
                            @elseif(Request::segment(3)=='Output')
                                <a href="{{ route(Auth::user()->role.'.io_status', 'Input') }}" class="btn btn-primary d-block">Input</a>
                                <a href="{{ route(Auth::user()->role.'.io_status', 'Output') }}" class="btn btn-success disabled d-block mt-2">Output</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary position-fixed" style="right: 4vh; bottom: 8vh" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add IO
            </button>
            {!! Form::open(['method' => 'post', 'route' => [Auth::user()->role.'.inputoutput.store'], 'enctype' => 'multipart/form-data']) !!}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add IO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submiy" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('script')
    {{-- <script>
        setTimeout(function(){
          window.location.reload(1);
        }, 1000);
    </script> --}}
@endsection
