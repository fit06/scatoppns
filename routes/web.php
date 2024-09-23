<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ButtonController;
use App\Http\Controllers\Admin\ConveyorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IOController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ValveController;
use App\Models\About;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\View;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (){
    $setting = Setting::first();
    $about = About::first();
    return View('welcome', compact('setting', 'about'));
});
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('prosesLogin');
Route::get('logout/{slug}', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth:user']], function () {

    Route::get('user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    Route::get('user/reset', [DashboardController::class, 'reset'])->name('user.reset');

    Route::get('user/aboutus', [ButtonController::class, 'aboutus'])->name('user.aboutus');
    Route::get('user/io_status/{slug}', [ButtonController::class, 'io_status'])->name('user.io_status');
    Route::get('user/settings/{slug}', [ButtonController::class, 'setting'])->name('user.settings');
    Route::post('user/settings/valve/{kode}', [ButtonController::class, 'valve'])->name('user.settings.valve');
    Route::post('user/settings/conveyor/{kode}', [ButtonController::class, 'conveyor'])->name('user.settings.conveyor');
    
    Route::get('user/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::put('user/profile/update/{id}', [ProfileController::class, 'update'])->name('user.profile.update');

    Route::get('user/button_1', [DashboardController::class, 'button_1'])->name('user.button_1');
    Route::get('user/button_2', [DashboardController::class, 'button_2'])->name('user.button_2');

});

Route::group(['middleware' => ['auth:admin']], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/reset', [DashboardController::class, 'reset'])->name('admin.reset');

    Route::get('admin/aboutus', [ButtonController::class, 'aboutus'])->name('admin.aboutus');
    Route::get('admin/io_status/{slug}', [ButtonController::class, 'io_status'])->name('admin.io_status');
    Route::get('admin/settings/{slug}', [ButtonController::class, 'setting'])->name('admin.settings');
    Route::post('admin/settings/valve/{kode}', [ButtonController::class, 'valve'])->name('admin.settings.valve');
    Route::post('admin/settings/conveyor/{kode}', [ButtonController::class, 'conveyor'])->name('admin.settings.conveyor');
    
    Route::get('admin/profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::put('admin/profile/update/{id}', [ProfileController::class, 'update'])->name('admin.profile.update');

    Route::get('admin/button_1', [DashboardController::class, 'button_1'])->name('admin.button_1');
    Route::get('admin/button_2', [DashboardController::class, 'button_2'])->name('admin.button_2');

    Route::get('admin/inputoutput', [IOController::class, 'index'])->name('admin.inputoutput');
    Route::get('admin/inputoutput/getListData', [IOController::class, 'listData'])->name('admin.inputoutput.list');
    Route::get('admin/inputoutput/add', [IOController::class, 'create'])->name('admin.inputoutput.add');
    Route::post('admin/inputoutput/store', [IOController::class, 'store'])->name('admin.inputoutput.store');
    Route::get('admin/inputoutput/edit/{id}', [IOController::class, 'edit'])->name('admin.inputoutput.edit');
    Route::put('admin/inputoutput/update/{id}', [IOController::class, 'update'])->name('admin.inputoutput.update');
    Route::get('admin/inputoutput/delete/{id}', [IOController::class, 'destroy'])->name('admin.inputoutput.delete');

    Route::get('admin/conveyor', [ConveyorController::class, 'index'])->name('admin.conveyor');
    Route::get('admin/conveyor/getListData', [ConveyorController::class, 'listData'])->name('admin.conveyor.list');
    Route::get('admin/conveyor/add', [ConveyorController::class, 'create'])->name('admin.conveyor.add');
    Route::post('admin/conveyor/store', [ConveyorController::class, 'store'])->name('admin.conveyor.store');
    Route::get('admin/conveyor/edit/{id}', [ConveyorController::class, 'edit'])->name('admin.conveyor.edit');
    Route::put('admin/conveyor/update/{id}', [ConveyorController::class, 'update'])->name('admin.conveyor.update');
    Route::get('admin/conveyor/delete/{id}', [ConveyorController::class, 'destroy'])->name('admin.conveyor.delete');

    Route::get('admin/valve', [ValveController::class, 'index'])->name('admin.valve');
    Route::get('admin/valve/getListData', [ValveController::class, 'listData'])->name('admin.valve.list');
    Route::get('admin/valve/add', [ValveController::class, 'create'])->name('admin.valve.add');
    Route::post('admin/valve/store', [ValveController::class, 'store'])->name('admin.valve.store');
    Route::get('admin/valve/edit/{id}', [ValveController::class, 'edit'])->name('admin.valve.edit');
    Route::put('admin/valve/update/{id}', [ValveController::class, 'update'])->name('admin.valve.update');
    Route::get('admin/valve/delete/{id}', [ValveController::class, 'destroy'])->name('admin.valve.delete');

    Route::get('admin/button', [ButtonController::class, 'index'])->name('admin.button');
    Route::get('admin/button/getListData', [ButtonController::class, 'listData'])->name('admin.button.list');
    Route::get('admin/button/add', [ButtonController::class, 'create'])->name('admin.button.add');
    Route::post('admin/button/store', [ButtonController::class, 'store'])->name('admin.button.store');
    Route::get('admin/button/edit/{id}', [ButtonController::class, 'edit'])->name('admin.button.edit');
    Route::put('admin/button/update/{id}', [ButtonController::class, 'update'])->name('admin.button.update');
    Route::get('admin/button/delete/{id}', [ButtonController::class, 'destroy'])->name('admin.button.delete');

    Route::get('admin/pengguna', [PenggunaController::class, 'index'])->name('admin.pengguna');
    Route::get('admin/pengguna/getListData', [PenggunaController::class, 'listData'])->name('admin.pengguna.list');
    Route::get('admin/pengguna/add', [PenggunaController::class, 'create'])->name('admin.pengguna.add');
    Route::post('admin/pengguna/store', [PenggunaController::class, 'store'])->name('admin.pengguna.store');
    Route::get('admin/pengguna/edit/{id}', [PenggunaController::class, 'edit'])->name('admin.pengguna.edit');
    Route::put('admin/pengguna/update/{id}', [PenggunaController::class, 'update'])->name('admin.pengguna.update');
    Route::get('admin/pengguna/delete/{id}', [PenggunaController::class, 'destroy'])->name('admin.pengguna.delete');

    Route::get('admin/about', [AboutController::class, 'index'])->name('admin.about');
    Route::get('admin/about/getListData', [AboutController::class, 'listData'])->name('admin.about.list');
    Route::get('admin/about/add', [AboutController::class, 'create'])->name('admin.about.add');
    Route::post('admin/about/store', [AboutController::class, 'store'])->name('admin.about.store');
    Route::get('admin/about/edit/{id}', [AboutController::class, 'edit'])->name('admin.about.edit');
    Route::put('admin/about/update/{id}', [AboutController::class, 'update'])->name('admin.about.update');

    Route::get('admin/setting', [SettingController::class, 'index'])->name('admin.setting');
    Route::get('admin/setting/getListData', [SettingController::class, 'listData'])->name('admin.setting.list');
    Route::get('admin/setting/add', [SettingController::class, 'create'])->name('admin.setting.add');
    Route::post('admin/setting/store', [SettingController::class, 'store'])->name('admin.setting.store');
    Route::get('admin/setting/edit/{id}', [SettingController::class, 'edit'])->name('admin.setting.edit');
    Route::put('admin/setting/update/{id}', [SettingController::class, 'update'])->name('admin.setting.update');

});
