<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Ressources;
use App\Http\Controllers\RessourcesController;
use App\Http\Controllers\CommentsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accueil', function () {
    return view('accueil');
})->middleware(['auth', 'verified'])->name('accueil');

Route::get('/support', function () {
    return view('support');
})->middleware(['auth', 'verified'])->name('support');

Route::get('/ressources', function () {
    $ressources = Ressources::all();

    return view('ressources', [
        'ressources' => $ressources
    ]);
})->middleware(['auth', 'verified'])->name('ressources');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('createressource', [RessourcesController::class, 'create']);
Route::post('storeressource', [RessourcesController::class, 'store']);

Route::post('storecomment/{id}', [CommentsController::class, 'store']);

Route::get('showressource/{id}', [RessourcesController::class,'show'])->name('ressource.show');


require __DIR__.'/auth.php';
