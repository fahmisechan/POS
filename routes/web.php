<?php

use Illuminate\Support\Facades\Route;


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
    return view('welcome');
});

Auth::routes();

Route::get('admin/login','Auth\AdminController@getlogin')->name('admin.login');
Route::post('admin/login','Auth\AdminController@postlogin');
Route::middleware('auth:admin')->group(function(){
  Route::get('/dashboard', 'HomeController@index');
  Route::get('/barang/{id}','BarangController@profile')->name('barang.profile');
  Route::get('supplier/{id}','SupplierController@profile');
  Route::resource('supplier','SupplierController');
  Route::get('laporan/table','LaporanController@table')->name('laporan.table');
  Route::get('laporan/cetak/{id}','LaporanController@cetak');
  Route::get('laporan/chart','LaporanController@chart');
  Route::post('laporan/getTahun','LaporanController@getTahun');
  Route::resource('barang','BarangController');
  Route::get('/akun','ProfileController@index')->name('profile.index');
  Route::post('/akun/store','ProfileController@store')->name('akun.store');
  Route::delete('/akun/{id}','ProfileController@destroy')->name('akun.destroy');
  Route::get('/profile/{id}','ProfileController@detail');
  });
  Route::get('kasir','TransaksiController@barangkasir');
  Route::get('/home','HomeController@home');
  Route::view('/app','layouts.app');
  Route::get('/transaksi','TransaksiController@index')->name('transaksi.index');
  Route::post('/transaksi/store','TransaksiController@store')->name('transaksi.store');
  Route::post('/cart/destroy/{id}','TransaksiController@destroy');
  Route::get('/transaksi/autofill/{id}','TransaksiController@autofill')->name('autofill');
  Route::post('/transaksi/bayar','TransaksiController@bayar');
  