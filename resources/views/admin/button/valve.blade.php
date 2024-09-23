@extends('admin.layouts.app')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Valve</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @foreach ($valve as $key => $row)
                            @if ($row->menu == 'Monitoring')
                                <div class="col-md-6">
                                    <div style="height: 400px;">
                                        <div id="gauge{{$key}}" style="width: 100%; height: 100%;"></div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        
                        <div class="col-md-6">
                            <h4 class="text-upperacase">Monitoring</h4>
                            @foreach ($valve as $key => $row)
                                @if ($row->menu == 'Monitoring')
                                    {!! Form::open(['method' => 'post', 'route' => [Auth::user()->role . '.settings.valve', $row->kode]]) !!}
                                    <div class="form-group">
                                        <label for="">{{ $row->input }}</label>
                                        <input type="number" name="value" id="valve{{$key}}" class="form-control" min="0"
                                            value="{{ $row->value }}">
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
                        <div class="col-md-6">
                            <h4 class="text-upperacase">Setting</h4>
                            @foreach ($valve as $row)
                                @if ($row->menu == 'Setting')
                                    {!! Form::open(['method' => 'post', 'route' => [Auth::user()->role . '.settings.valve', $row->kode]]) !!}
                                    <div class="form-group">
                                        <label for="">{{ $row->input }}</label>
                                        <input type="number" name="value" class="form-control" min="0"
                                            value="{{ $row->value }}">
                                    </div>
                                    {!! Form::close() !!}
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <a href="{{ route(Auth::user()->role . '.settings', 'setting') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
@php
    $no = 1;
@endphp
@foreach ($valve as $key => $row)
    @if ($row->menu == 'Monitoring')
    anychart.onDocumentReady(function () {
      var gauge = anychart.gauges.circular();
      gauge
        .fill('#fff')
        .stroke(null)
        .padding(0)
        .margin(100)
        .startAngle(270)
        .sweepAngle(180);

      gauge
        .axis()
        .labels()
        .padding(5)
        .fontSize(14)
        .position('outside')
        .format('{%Value}');

      gauge.data([$('#valve{{$key}}').val()]);
      gauge
        .axis()
        .scale()
        .minimum(0)
        .maximum(1000)
        .ticks({ interval: 10 })
        .minorTicks({ interval: 5 });

      gauge
        .axis()
        .fill('#545f69')
        .width(1)
        .ticks({ type: 'line', fill: 'white', length: 2 });

      gauge.title(
        'Valve {{$no}}<br/>' +
        '<span style="color:#009900; font-size: 14px;">(Satuan Mililiter)</span>'
      );
      gauge
        .title()
        .useHtml(true)
        .padding(0)
        .fontColor('#212121')
        .hAlign('center')
        .margin([0, 0, 10, 0]);

      gauge
        .needle()
        .stroke('2 #545f69')
        .startRadius('5%')
        .endRadius('90%')
        .startWidth('0.1%')
        .endWidth('0.1%')
        .middleWidth('0.1%');

      gauge.cap().radius('3%').enabled(true).fill('#545f69');

      gauge.range(0, {
        from: 0,
        to: 334,
        position: 'inside',
        fill: '#009900 0.4',
        startSize: 50,
        endSize: 50,
        radius: 98
      });

      gauge.range(1, {
        from: 334,
        to: 668,
        position: 'inside',
        fill: '#009900 0.4',
        startSize: 50,
        endSize: 50,
        radius: 98
      });

      gauge.range(2, {
        from: 668,
        to: 1000,
        position: 'inside',
        fill: '#009900 0.4',
        startSize: 50,
        endSize: 50,
        radius: 98
      });

      gauge
        .label(1)
        .text('')
        .fontColor('#212121')
        .fontSize(14)
        .offsetY('68%')
        .offsetX(25)
        .anchor('center');

      gauge
        .label(2)
        .text('')
        .fontColor('#212121')
        .fontSize(14)
        .offsetY('68%')
        .offsetX(90)
        .anchor('center');

      gauge
        .label(3)
        .text('')
        .fontColor('#212121')
        .fontSize(14)
        .offsetY('68%')
        .offsetX(155)
        .anchor('center');

      gauge.container('gauge{{$key}}');
      gauge.draw();
    });
    @php
        $no++;
    @endphp
    @endif
@endforeach
  
</script>
@endsection
