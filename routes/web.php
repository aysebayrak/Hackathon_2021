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
    return redirect('/dashboard');
});
Route::get('/test',function (){
    return \App\Models\Order::where('farmer_id',\Illuminate\Support\Facades\Auth::user()->id)->get()->first()->product;
    return \App\Models\Order::all()->first()->customer;
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('forms', 'forms')->name('forms');
    Route::view('cards', 'cards')->name('cards');
    Route::view('charts', 'charts')->name('charts');
    Route::view('buttons', 'buttons')->name('buttons');
    Route::view('modals', 'modals')->name('modals');
    Route::view('tables', 'tables')->name('tables');
    Route::view('calendar', 'calendar')->name('calendar');

    Route::resource('farmers', \App\Http\Controllers\FarmerController::class);
    Route::post('farmers/licence',[\App\Http\Controllers\FarmerController::class,"licence"]);
    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::resource('orders',\App\Http\Controllers\OrderController::class)->except('create');
    Route::get('orders/create/{id}',[\App\Http\Controllers\OrderController::class,'create']);

    Route::view('/admin/confirmApps','admin.farmerApps',['farmers'=>\App\Models\Farmer::where('confirmed_at',null)->get()])
        ->middleware('can:admin');
    Route::get('/admin/confirmFarmer/{id}',function ($id){
       $farmer = \App\Models\Farmer::find($id);
       $farmer->confirmed_at = \Carbon\Carbon::now();
       $farmer->save();
       return back();
    })
        ->middleware('can:admin');
});

Route::view('/shop','shop',["products"=>\App\Models\Product::where("sold_at","=",null)->get()])->name('shop');
