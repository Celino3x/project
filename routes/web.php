<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicadorController;
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

Route::get('/', [PublicadorController::class, 'index'])->name('publicador.index');


//Prefixado para o submenu Admin

Route::prefix('admin')->group(function(){
    Route::get('painel', function (){
        return "painel";
    });
});

//Página de designados
Route::get('/designados', function (){
    return view('designados');
});



//Login Breeze
Route::get('/login', function (){
    return view('login');
});

Route::get('/dashboard', function () {
   return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
