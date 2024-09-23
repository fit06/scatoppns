<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AboutController extends Controller
{
    // menampilkan halaman
    public function index()
    {
        $setting = Setting::first();

        $about = About::first();

        return view('admin.about.index', compact('setting', 'about'));
    }

    // menampilkan data dengan datatable
    public function listData()
    {
        $data = About::query();
        $datatables = DataTables::of($data)
            ->addIndexColumn()
            
            ->addColumn('action', function($row) {
                $btn = '<a href="'.route(Auth::user()->role.'.about.edit', $row->id).'" class="btn btn-primary btn-sm" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>';

                return $btn;
            })
            ->rawColumns(['action', 'deskripsi'])
            ->make(true);

        return $datatables;
    }

    // menampilkan halaman tambah
    public function create()
    {
        $setting = Setting::first();

        return view('admin.about.add', compact('setting'));
    }

    // proses tambah
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
        ],
        [
            'required' => ':attribute wajib diisi!!',
            'mimes' => ':attribute harus berformat jpg,jpeg,png,svg,webp'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        $about = new About;
        $about->judul = $request->judul;
        $about->deskripsi = $request->deskripsi;
        $about->save();

        return redirect()->route(Auth::user()->role.'.about')->with('berhasil', 'About berhasil ditambahkan');
    }

    // menampilkan halaman edit
    public function edit($id)
    {
        $setting = Setting::first();

        $about = About::find($id);

        return view('admin.about.edit', compact('setting', 'about'));
    }

    // proses tambah
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required',
            'deskripsi' => 'required',
        ],
        [
            'required' => ':attribute wajib diisi!!',
            'mimes' => ':attribute harus berformat jpg,jpeg,png,svg,webp'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        $about = About::find($id);
        $about->judul = $request->judul;
        $about->deskripsi = $request->deskripsi;
        $about->save();

        return redirect()->route(Auth::user()->role.'.about')->with('berhasil', 'About berhasil diubah');
    }
}
