<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('dashboard', [DashboardController::class, 'show'])->middleware('auth')->name('dashboard');
Route::get('admin', [DashboardController::class, 'show']);

//LOGOUT
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');


Route::get('admin/user', [AdminUserController::class, 'index'])->name('user');
Route::get('admin/user/add', [AdminUserController::class, 'add'])->name('user.add');
Route::post('admin/user/store', [AdminUserController::class, 'store']);