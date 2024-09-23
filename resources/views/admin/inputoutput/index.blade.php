@extends('admin.layouts.app')
@include('admin.layouts.partials.css')
@include('admin.layouts.partials.js')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Input Output</h3>
        </div>

        <div class="ms-md-auto py-2 py-md-0">
            <a href="{{ route(Auth::user()->role.'.inputoutput.add') }}" class="btn btn-primary btn-round"><i class="fas fa-plus"></i> Tambah</a>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Menu</th>
                                    <th>Button</th>
                                    <th>Kode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <script>
        $(function() {
            $('#table-1').dataTable({
                processing: true,
                serverSide: true,
                'ordering': 'true',
                'language' : {
                    "lengthMenu": "_MENU_ data per halaman",
                    "info": "Menampilkan data _PAGE_ dari total _PAGES_",
                    "infoEmpty": "Tidak ada data",
                    "search": "Cari"
                },
                ajax: {
                    url: "{{ route(Auth::user()->role.'.inputoutput.list') }}",
                    data: function(d) {}
                },
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'menu',
                        name: 'menu'
                    },
                    {
                        data: 'button',
                        name: 'button'
                    },
                    {
                        data: 'kode',
                        name: 'kode'
                    },                 
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>
@endsection