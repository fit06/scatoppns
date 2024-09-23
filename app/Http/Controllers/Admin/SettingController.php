<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SettingController extends Controller
{
    // menampilkan halaman
    public function index()
    {
        $setting = Setting::first();

        return view('admin.setting.index', compact('setting'));
    }

    // menampilkan data dengan datatable
    public function listData()
    {
        $data = Setting::query();
        $datatables = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('logo', function($row) {
                return '<img src="'.url($row->logo).'" width="50">';
            })
            ->addColumn('favicon', function($row) {
                return '<img src="'.url($row->favicon).'" width="50">';
            })
            ->addColumn('action', function($row) {
                $btn = '<a href="'.route('admin.setting.edit', $row->id).'" class="btn btn-primary btn-sm" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>';

                return $btn;
            })
            ->rawColumns(['action', 'logo', 'favicon'])
            ->make(true);

        return $datatables;
    }

    // menampilkan halaman tambah
    public function create()
    {
        $setting = Setting::first();

        return view('admin.setting.add', compact('setting'));
    }

    // proses tambah
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_website' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'logo' => 'required|mimes:png,jpg,jpeg,svg,webp',
            'favicon' => 'required|mimes:png,jpg,jpeg,svg,webp'
        ],
        [
            'required' => ':attribute wajib diisi!!',
            'mimes' => ':attribute harus berformat jpg,jpeg,png,svg,webp'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        $logo = $request->file('logo');
        $namalogo = 'Logo-'.Carbon::now()->format('Ymd').Str::random(5).'.'.$logo->extension();
        $logo->move('images/', $namalogo);
        $logoName = 'images/'.$namalogo;

        $favicon = $request->file('favicon');
        $namafavicon = 'Favicon-'.Carbon::now()->format('Ymd').Str::random(5).'.'.$favicon->extension();
        $favicon->move('images/', $namafavicon);
        $faviconName = 'images/'.$namafavicon;

        $setting = new Setting;
        $setting->nama_website = $request->nama_website;
        $setting->email = $request->email;
        $setting->no_telp = $request->no_telp;
        $setting->alamat = $request->alamat;
        $setting->logo = $logoName;
        $setting->favicon = $faviconName;
        $setting->save();

        return redirect()->route('admin.setting')->with('berhasil', 'Pengaturan website berhasil ditambahkan');
    }

    // menampilkan halaman edit
    public function edit($id)
    {
        $setting = Setting::find($id);

        return view('admin.setting.edit', compact('setting'));
    }

    // proses tambah
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_website' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'logo' => 'mimes:png,jpg,jpeg,svg,webp',
            'favicon' => 'mimes:png,jpg,jpeg,svg,webp'
        ],
        [
            'required' => ':attribute wajib diisi!!',
            'mimes' => ':attribute harus berformat jpg,jpeg,png,svg,webp'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        if ($request->logo <> '') {
            $logo = $request->file('logo');
            $namalogo = 'Logo-'.Carbon::now()->format('Ymd').Str::random(5).'.'.$logo->extension();
            $logo->move('images/', $namalogo);
            $logoName = 'images/'.$namalogo;
        }

        if ($request->favicon <> '') {
            $favicon = $request->file('favicon');
            $namafavicon = 'Favicon-'.Carbon::now()->format('Ymd').Str::random(5).'.'.$favicon->extension();
            $favicon->move('images/', $namafavicon);
            $faviconName = 'images/'.$namafavicon;
        }

        $setting = Setting::find($id);
        $setting->nama_website = $request->nama_website;
        $setting->email = $request->email;
        $setting->no_telp = $request->no_telp;
        $setting->alamat = $request->alamat;
        if ($request->logo <> '') {
            $setting->logo = $logoName;
        }
        if ($request->favicon <> '') {
            $setting->favicon = $faviconName;
        }
        $setting->save();

        return redirect()->route('admin.setting')->with('berhasil', 'Pengaturan website berhasil diubah');
    }
}
