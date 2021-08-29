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

Route::get('dashboard', [DashboardController::class, 'show'])->middleware('auth');
//USER
Route::get('admin/user/list', [AdminUserController::class, 'list']);
Route::get('admin/user/add', [AdminUserController::class, 'add']);
Route::post('admin/user/store', [AdminUserController::class, 'store']);