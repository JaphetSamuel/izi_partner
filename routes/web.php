<?php

use Illuminate\Support\Facades\DB;
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
//    $val = DB::connection('izigo')->table('partners')->get();
    $val = \App\Models\Partner::query()->where('id','=',9)->first();
//    $val = DB::connection('izigo')->table('users')
//    ->join('partners','users.id','=','partners.user_id')
//    ->get();
    dd($val->partner);
    return view('welcome');
});
