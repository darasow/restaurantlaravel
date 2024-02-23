<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Partenaire\PartenaireController;
use App\Http\Controllers\Partenaire\DashboardController;
use App\Http\Controllers\Categorie\CategorieController;
use App\Http\Controllers\Restaurant\RestaurantController;
use App\Http\Controllers\Element\ElementController;
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

Route::prefix('partenaires')->middleware('auth')->name('partenaires.')->group(function(){

    Route::resource("/", PartenaireController::class);
    Route::resource("reference", PartenaireController::class);
    Route::resource("dashboard", DashboardController::class);
    Route::resource("categorie", CategorieController::class);
    Route::resource("restaurant", RestaurantController::class);
    Route::resource("element", ElementController::class);

});


/*
Je vais mettre en place la structure pour le dashboard du partenaire
- c'est a dire la page d'acceuil 
apres la logique de creation des tables et leurs vue
*/ 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
