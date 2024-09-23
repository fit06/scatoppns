<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PenggunaController extends Controller
{
    // menampilkan halaman index
    public function index()
    {
        $setting = Setting::first();

        return view('admin.pengguna.index', compact('setting'));
    }

    // menampilkan data dengan datatable
    public function listData()
    {
        $data = User::query();
        $datatables = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $btn = '<a href="'.route(Auth::user()->role.'.pengguna.edit', $row->id).'" class="btn btn-primary btn-sm me-2" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>';
                if ($row->id <> Auth::user()->id) {
                    $btn .= '<a href="'.route(Auth::user()->role.'.pengguna.delete', $row->id).'" class="btn btn-danger btn-sm" title="Hapus">
                            <i class="fas fa-edit"></i> Hapus
                        </a>';
                }    

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

        $role = array('admin', 'user');

        return view('admin.pengguna.add', compact('setting', 'role'));
    }

    // Proses tambah
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
        ], 
        [
            'required' => ':attribute wajib diisi!!'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        $pengguna = new User;
        $pengguna->role = $request->role;
        $pengguna->name = $request->nama;
        $pengguna->email = $request->email;
        $pengguna->password = Hash::make($request->password);
        $pengguna->save();

        return redirect()->route(Auth::user()->role.'.pengguna')->with('berhasil', 'Pengguna berhasil ditambahkan');
    }

    // menampilkan halaman edit
    public function edit($id)
    {
        $setting = Setting::first();

        $role = array('admin', 'user');
        $pengguna = User::find($id);

        return view('admin.pengguna.edit', compact('setting', 'role', 'pengguna'));
    }

    // Proses edit
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'role' => 'required',
            'nama' => 'required',
            'email' => 'required',
        ], 
        [
            'required' => ':attribute wajib diisi!!'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        $pengguna = User::find($id);
        $pengguna->role = $request->role;
        $pengguna->name = $request->nama;
        $pengguna->email = $request->email;
        if ($request->password <> '') {
            $pengguna->password = Hash::make($request->password);
        }
        $pengguna->save();

        return redirect()->route(Auth::user()->role.'.pengguna')->with('berhasil', 'Pengguna berhasil diubah');
    }

    // Proses hapus
    public function destroy($id)
    {
        $pengguna = User::find($id);
        $pengguna->delete();

        return back()->with('berhasil', 'Pengguna berhasil dihapus');
    }
}
