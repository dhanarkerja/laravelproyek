<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\BarangController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::group([
    'prefix'=>config('admin.prefix'),
    'namespace'=>'App\\Http\\Controllers',
],function () {

    Route::get('login','LoginAdminController@formLogin')->name('admin.login');
    Route::post('login','LoginAdminController@login');

    Route::get('data-admin', 'DataController@getData');
    Route::get('register','RegisterController@formRegister')->name('admin.register');
   

    Route::middleware(['auth:admin'])->group(function () {
        Route::post('logout','LoginAdminController@logout')->name('admin.logout');
        Route::view('/','dashboard')->name('dashboard');

        // akan di cek kembali
        Route::get('/',[BarangController::class, 'getData'], function () {
            return view('dashboard');
        })->name('dashboard');
        
        // barang
        Route::view('/barang','data-barang')->name('barang')->middleware('can:role,"admin"');
        Route::get('/barang',[BarangController::class, 'getData'], function () {
            return view('data-barang');
        })->name('barang');// get data


        // data user
        Route::view('/post','data-post')->name('post')->middleware('can:role,"admin","editor"');
        Route::view('/admin','data-admin')->name('admin')->middleware('can:role,"admin"');
        Route::get('/admin',[DataController::class, 'getData'], function () {
            return view('data-admin');
        })->name('admin');// get data
        Route::delete('/admin/{id}', [DataController::class, 'deleteData'])->name('destroy');
        // Route::view('/edit/{id}','data-edit')->name('edit')->middleware('can:role,"admin"');
        // Route::get('/edit/{id}', [DataController::class, 'geteditData']);
        Route::get('/admin/edit/{id}',[DataController::class, 'geteditData'], function () {
            return view('data-edit');
        })->name('edit')->middleware('can:role,"admin"');;
        Route::put('/admin/edit/{id}', [DataController::class, 'updateData'])->name('update');
    });
});

//register
Route::resource('register', RegisterController::class);