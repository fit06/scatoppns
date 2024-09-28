<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Conveyor;
use App\Models\InputOutput;
use App\Models\Setting;
use App\Models\Valve;
use Illuminate\Http\Request;

class ButtonController extends Controller
{
    // menampilkan halaman about
    public function aboutus()
    {
        $setting = Setting::first();

        $about = About::first();

        return view('admin.button.about', compact('setting', 'about'));
    }

    // menampilkan halaman io status
    public function io_status($slug = null)
    {
        $setting = Setting::first();
        $menu = array('Input', 'Output');

        if ($slug == '' || $slug == 'Input') {
            $input = InputOutput::where('menu', 'Input')->get();
        } elseif ($slug == 'Output') {
            $input = InputOutput::where('menu', 'Output')->get();
        }
        return view('admin.button.io_status', compact('setting', 'input', 'menu'));
    }

    // menampilkan halaman setting
    public function setting($slug)
    {
        $setting = Setting::first();

        if ($slug == 'setting') {
            return view('admin.button.setting', compact('setting'));
        } elseif ($slug == 'valve') {
            $valve = Valve::get();
            return view('admin.button.valve', compact('setting', 'valve'));
        } elseif ($slug == 'conveyor') {
            $conveyor = Conveyor::get();
            return view('admin.button.conveyor', compact('setting', 'conveyor'));
        }
    }

    // Proses valve
    public function valve(Request $request, $kode)
    {
        $valve = Valve::where('kode', $kode)->first();
        $valve->value = $request->value;
        $valve->save();

        return back()->with('berhasil', 'Value berhasil diubah');
    }

    // Proses conveyor
    public function conveyor(Request $request, $kode)
    {
        $conveyor = Conveyor::where('kode', $kode)->first();
        $conveyor->value = $request->value;
        $conveyor->save();

        return back()->with('berhasil', 'Value berhasil diubah');
    }
}
