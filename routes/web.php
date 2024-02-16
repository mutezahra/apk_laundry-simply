<?php

use App\Http\Controllers\LogC;
use App\Http\Controllers\UserC;
use App\Http\Controllers\LoginC;
use App\Http\Controllers\LaporanC;
use App\Http\Controllers\ProductsC;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionsC;

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
    $subtitle = "Home Page";
    return view('login', compact('subtitle'));
});
Route::get('/dashboard', function () {
    $subtitle = "Home Page";
    return view('dashboard', compact('subtitle'));
});



// Route::get('/transactions/pdf', [TransactionsC::class, 'Pdf'])->name('transactions.pdf')->
Route::get('/transactions/pdf/{id}', [TransactionsC::class,'Pdf'])->name('transactions.pdf')->middleware('userAkses:kasir');

Route::get('laporan', [LaporanC::class, 'index'])->name('laporan');
Route::get('/laporan/filter', [LaporanC::class, 'filter'])->name('laporan.filter');
Route::get('/laporan/export', [LaporanC::class, 'export'])->name('laporan.export');

Route::put('users/change/{id}', [UserC::class, 'change'])->name('users.change')->middleware('userAkses:owner,admin');
Route::get('users/changepassword/{id}', [UserC::class, 'changepassword'])->name('users.changepassword')->middleware('userAkses:owner,admin');
Route::resource('users', UserC::class)->middleware('userAkses:owner,admin');
Route::get('login',[LoginC::class,'login'])->name('login')->middleware('guest');
Route::post('login', [LoginC::class,'login_action'])->name('login.action')->middleware('guest');;
Route::get('logout', [LoginC::class, 'logout'])->name('logout');


Route::resource('products', ProductsC::class)->middleware('userAkses:admin,kasir,owner');
Route::get('transactions', [TransactionsC::class, 'index'])->name('transactions.index')->middleware('userAkses:kasir,admin');
Route::get('transactions/create', [TransactionsC::class, 'create'])->name('transactions.create')->middleware('userAkses:kasir,admin');
Route::post('transactions/store', [TransactionsC::class, 'store'])->name('transactions.store')->middleware('userAkses:kasir,admin');
Route::get('transactions/edit/{id}', [TransactionsC::class, 'edit'])->name('transactions.edit')->middleware('userAkses:admin');
Route::put('transactions/update{id}', [TransactionsC::class, 'update'])->name('transactions.update')->middleware('userAkses:admin');
Route::delete('transactions/delete{id}', [TransactionsC::class, 'delete'])->name('transactions.delete')->middleware('userAkses:admin');
 
Route::get('laporan', [LaporanC::class, 'index'])->name('laporan.index');

Route::resource('log', LogC::class);

