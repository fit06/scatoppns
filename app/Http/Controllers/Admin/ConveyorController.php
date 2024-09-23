<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Conveyor;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ConveyorController extends Controller
{
    // menampilkan halaman index
    public function index()
    {
        $setting = Setting::first();

        return view('admin.conveyor.index', compact('setting'));
    }

    // menampilkan data dengan datatable
    public function listData()
    {
        $data = Conveyor::query();
        $datatables = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $btn = '<a href="'.route(Auth::user()->role.'.conveyor.edit', $row->id).'" class="btn btn-primary btn-sm me-2" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>';
                $btn .= '<a href="'.route(Auth::user()->role.'.conveyor.delete', $row->id).'" class="btn btn-danger btn-sm" title="Hapus">
                        <i class="fas fa-edit"></i> Hapus
                    </a>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $datatables;
    }

    // menampilkan halaman tambah
    public function create()
    {
        $setting = Setting::first();

        $menu = array('Monitoring', 'Setting', 'Production Plan');

        return view('admin.conveyor.add', compact('setting', 'menu'));
    }

    // Proses tambah
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'menu' => 'required',
            'input' => 'required',
            'kode' => 'required',
        ], 
        [
            'required' => ':attribute wajib diisi!!'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        $conveyor = new Conveyor;
        $conveyor->menu = $request->menu;
        $conveyor->input = $request->input;
        $conveyor->kode = $request->kode;
        $conveyor->save();

        return redirect()->route(Auth::user()->role.'.conveyor')->with('berhasil', 'Conveyor berhasil ditambahkan');
    }

    // menampilkan halaman edit
    public function edit($id)
    {
        $setting = Setting::first();

        $menu = array('Monitoring', 'Setting', 'Production Plan');
        $conveyor = Conveyor::find($id);

        return view('admin.conveyor.edit', compact('setting', 'menu', 'conveyor'));
    }

    // Proses edit
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'menu' => 'required',
            'input' => 'required',
            'kode' => 'required',
        ], 
        [
            'required' => ':attribute wajib diisi!!'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        $conveyor = Conveyor::find($id);
        $conveyor->menu = $request->menu;
        $conveyor->input = $request->input;
        $conveyor->kode = $request->kode;
        $conveyor->save();

        return redirect()->route(Auth::user()->role.'.conveyor')->with('berhasil', 'Conveyor berhasil diubah');
    }

    // Proses hapus
    public function destroy($id)
    {
        $conveyor = Conveyor::find($id);
        $conveyor->delete();

        return back()->with('berhasil', 'Conveyor berhasil dihapus');
    }
}
