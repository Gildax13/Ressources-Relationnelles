<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Ressources;
use App\Http\Controllers\RessourcesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\SupportController;
use App\Models\Support;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
    $ressource = DB::select('SELECT * FROM ressources ORDER BY created_at DESC LIMIT 3');
    return view('accueil', ['ressource'=>$ressource]);
})->middleware(['auth', 'verified'])->name('accueil');
Route::get('/support', function () {
    return view('support');
})->middleware(['auth', 'verified'])->name('support');
Route::get('checksupport',function(){
    $support = Support::all();
    return view('checksupport', [
        'support' => $support
    ]);
})->middleware(['auth', 'verified', 'role:admin'])->name('checksupport');
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
Route::post('storesupport', [SupportController::class, 'store']);
Route::get('showressource/{id}', [RessourcesController::class,'show'])->name('ressource.show');
Route::middleware(['auth', 'role:admin'])->group(function () {  
    Route::get('showsupport/{id}', [SupportController::class,'show'])->name('support.show');
});

require __DIR__.'/auth.php';
