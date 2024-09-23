<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Valve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ValveController extends Controller
{
    // menampilkan halaman index
    public function index()
    {
        $setting = Setting::first();

        return view('admin.valve.index', compact('setting'));
    }

    // menampilkan data dengan datatable
    public function listData()
    {
        $data = Valve::query();
        $datatables = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $btn = '<a href="'.route(Auth::user()->role.'.valve.edit', $row->id).'" class="btn btn-primary btn-sm me-2" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>';
                $btn .= '<a href="'.route(Auth::user()->role.'.valve.delete', $row->id).'" class="btn btn-danger btn-sm" title="Hapus">
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

        $menu = array('Monitoring', 'Setting');

        return view('admin.valve.add', compact('setting', 'menu'));
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

        $valve = new Valve;
        $valve->menu = $request->menu;
        $valve->input = $request->input;
        $valve->kode = $request->kode;
        $valve->save();

        return redirect()->route(Auth::user()->role.'.valve')->with('berhasil', 'Valve berhasil ditambahkan');
    }

    // menampilkan halaman edit
    public function edit($id)
    {
        $setting = Setting::first();

        $menu = array('Monitoring', 'Setting');
        $valve = Valve::find($id);

        return view('admin.valve.edit', compact('setting', 'menu', 'valve'));
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

        $valve = Valve::find($id);
        $valve->menu = $request->menu;
        $valve->input = $request->input;
        $valve->kode = $request->kode;
        $valve->save();

        return redirect()->route(Auth::user()->role.'.valve')->with('berhasil', 'Valve berhasil diubah');
    }

    // Proses hapus
    public function destroy($id)
    {
        $valve = Valve::find($id);
        $valve->delete();

        return back()->with('berhasil', 'Valve berhasil dihapus');
    }
}
