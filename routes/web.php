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

use function GuzzleHttp\Promise\all;

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
    $ressources = Ressources::where('verified', '=', 1)->get();
    return view('welcome', [
        'ressources' => $ressources
    ]);
});

Route::get('/accueil', function () {
    $ressource = DB::select('SELECT * FROM ressources WHERE verified = 1 ORDER BY created_at DESC LIMIT 3');
    return view('accueil', ['ressource' => $ressource]);
})->middleware(['auth', 'verified'])->name('accueil');
Route::get('/support', function () {
    return view('support');
})->middleware(['auth', 'verified'])->name('support');
Route::get('checksupport', function () {
    $support = Support::all();
    return view('checksupport', [
        'support' => $support
    ]);
})->middleware(['auth', 'verified', 'role:admin'])->name('checksupport');
Route::get('/ressources', function () {
    $ressources = Ressources::where('verified', '=', 1)->get();
    return view('ressources', [
        'ressources' => $ressources
    ]);
})->middleware(['auth', 'verified'])->name('ressources');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('createressource', [RessourcesController::class, 'create'])->middleware(['auth', 'verified'])->name('createressource');
Route::post('storeressource', [RessourcesController::class, 'store'])->middleware(['auth', 'verified'])->name('storeressource');
Route::post('storecomment/{id}', [CommentsController::class, 'store'])->middleware(['auth', 'verified'])->name('storecomment.id');
Route::post('storesupport', [SupportController::class, 'store'])->middleware(['auth', 'verified'])->name('storesupport');
Route::get('showressource/{id}', [RessourcesController::class,'show'])->name('ressource.show')->middleware(['auth', 'verified'])->name('showressource.id');
Route::get('showressourceguest/{id}', [RessourcesController::class,'showguest'])->name('ressource.showguest')->name('showressourceguest.id');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('showsupport/{id}', [SupportController::class, 'show'])->name('support.show');
});
Route::get('verifyressource', function () {
    $ressources = Ressources::where('verified', '=', 0)->get();

    return view('verifyressource', [
        'ressources' => $ressources
    ]);
})->middleware(['auth', 'verified', 'role:admin'])->name('verifyressource');

Route::get('shownotverifiedressource/{id}', [RessourcesController::class, 'shownotverified'])->name('shownotverifiedressource.id')->middleware(['auth', 'verified', 'role:admin']);
Route::get('verifyressource/{id}', [RessourcesController::class, 'verifyressource'])->name('verifyressource.id')->middleware(['auth', 'verified', 'role:admin']);




require __DIR__ . '/auth.php';
