<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', [AdminController::class, 'home']);
Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/create_room', [AdminController::class, 'create_room'])->name('room.create');
Route::post('/add_room', [AdminController::class, 'add_room'])->name('room.store');
Route::get('/view_room', [AdminController::class, 'view_room'])->name('room.view');
Route::get('/delete_room/{id}', [AdminController::class, 'delete_room'])->name('room.delete');
Route::get('/update_room/{id}', [AdminController::class, 'update_room'])->name('room.update');
Route::post('/edit_room/{id}', [AdminController::class, 'edit_room'])->name('room.edit');


// https://www.youtube.com/watch?v=1K-4KcTVGIs&list=PLm8sgxwSZofeShFFRAfENHymQoKemCGtR&index=3