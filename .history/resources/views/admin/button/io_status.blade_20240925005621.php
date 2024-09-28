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
                                        {{-- <h3 class="mt-2 pt-3">{{ $row->nama }}</h3> --}}
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
