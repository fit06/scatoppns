<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InputOutput;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class IOController extends Controller
{
    // menampilkan halaman index
    public function index()
    {
        $setting = Setting::first();

        return view('admin.inputoutput.index', compact('setting'));
    }

    // menampilkan data dengan datatable
    public function listData()
    {
        $data = InputOutput::query();
        $datatables = DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $btn = '<a href="'.route(Auth::user()->role.'.inputoutput.edit', $row->id).'" class="btn btn-primary btn-sm me-2" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>';
                if ($row->menu <> 'Main Menu') {
                    $btn .= '<a href="'.route(Auth::user()->role.'.inputoutput.delete', $row->id).'" class="btn btn-danger btn-sm" title="Hapus">
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

        $menu = array('Input', 'Output');

        return view('admin.inputoutput.add', compact('setting', 'menu'));
    }

    // Proses tambah
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'menu' => 'required',
            'button' => 'required',
            'kode' => 'required',
        ],
        [
            'required' => ':attribute wajib diisi!!'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        $inputoutput = new InputOutput;
        $inputoutput->nama = $request->nama;
        $inputoutput->menu = $request->menu;
        $inputoutput->button = $request->button;
        $inputoutput->kode = $request->kode;
        $inputoutput->save();
        return response()->json(
            {
                "input": $request->targetRedirect
            }
        )
        if($request->has('targetRedirect')) {
            return redirect()->route(Auth::user()->role.'.inputoutput')->with('berhasil', 'Input Output berhasil ditambahkan');
        }
        return redirect()->route(Auth::user()->role.'.inputoutput')->with('berhasil', 'Input Output berhasil ditambahkan');
    }

    // Proses hapus
    public function destroy($id)
    {
        $inputoutput = InputOutput::find($id);
        $inputoutput->delete();

        return back()->with('berhasil', 'Input Output berhasil dihapus');
    }
}
