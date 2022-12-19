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

        


        // middleware kegunaanya untuk mencegah user unauthorized masuk dengan alamat link sesuai role mereka

        Route::post('logout','LoginAdminController@logout')->name('admin.logout');
        Route::view('/','dashboard')->name('dashboard');
        

        // akan di cek kembali
        Route::get('/',[BarangController::class, 'getDataDash'], function () {
            return view('dashboard');
        })->name('dashboard');
        
        // barang
        Route::view('/barang','data-barang')->name('barang')->middleware('can:role,"admin","pembelian"');
        Route::get('/read-barang',[BarangController::class,'getData'])->name('getBarang');
        Route::get('/create-barang',[BarangController::class,'create'])->name('createBarang');
        Route::get('/store-barang',[BarangController::class,'store'])->name('storeBarang');
        Route::get('/store-barang',[BarangController::class,'store'])->name('storeBarang');
        Route::get('/search-barang/{search}',[BarangController::class,'search'])->name('searchBarang');

        Route::get('/show-barang/{id}',[BarangController::class,'show']);//contoh penggunaan url di template blade
        //sesuaikan uri di php artisan route:list bila menggunakan url
        //jangan sampai berbeda nanti bisa terjadi 404 not found
        Route::get('/update-barang/{id}',[BarangController::class,'update']);
        Route::get('/destroy-barang/{id}',[BarangController::class,'destroy']);


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
        })->name('edit')->middleware('can:role,"admin"');
        Route::put('/admin/edit/{id}', [DataController::class, 'updateData'])->name('update');
    });
});

//register
Route::resource('register', RegisterController::class);