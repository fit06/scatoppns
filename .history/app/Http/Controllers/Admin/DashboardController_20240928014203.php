<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Button;
use App\Models\Setting;
use App\Models\TotalProduction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // menampilkan halaman index
    public function index()
    {
        $setting = Setting::first();
        $menu = array('Monitoring', 'Setting', 'Production Plan');

        $button_1 = Button::where('menu', 'Main Menu')->where('kode', 49)->first();
        $button_2 = Button::where('menu', 'Main Menu')->where('kode', 2)->first();
        $totalproduction = TotalProduction::first();

        return view('admin.dashboard.index', compact('setting', 'button_1', 'button_2', 'totalproduction', 'menu'));
    }

    public function reset()
    {
        $totalproduction = TotalProduction::first();
        $totalproduction->value = 0;
        $totalproduction->save();

        $button = Button::where('kode', 7)->first();
        $button->status = 1;
        $button->save();

        return back()->with('berhasil', 'Total production berhasil direset');
    }

    public function button_1()
    {
        $button = Button::where('kode', 49)->first();
        $button->status = 1;
        $button->save();

        $button = Button::where('kode', 2)->first();
        $button->status = 0;
        $button->save();

        return back()->with('berhasil', 'Button berhasil dinyalakan.');
    }

    public function button_2()
    {
        $button = Button::where('kode', 49)->first();
        $button->status = 0;
        $button->save();

        $button = Button::where('kode', 2)->first();
        $button->status = 1;
        $button->save();

        return back()->with('berhasil', 'Button berhasil dinyalakan.');
    }
}
