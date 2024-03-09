<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommandeController;

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

Route::get('/', [ProduitController::class, 'liste']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/produits', [ProduitController::class, 'liste'])->name('produits.liste');

Route::middleware(['auth'])->group(function () {

    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('produit', ProduitController::class);
    Route::resource('client', ClientController::class);
    Route::get('/produit/{produit}/commande',[CommandeController::class, 'create'] )->name('commande.create');
    Route::post('/commande', [CommandeController::class, 'store'])->name('commande.store');


})->name('admin.');


require __DIR__.'/auth.php';
