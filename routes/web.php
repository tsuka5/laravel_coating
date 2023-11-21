<?php

// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\SearchController;
use App\Http\Controllers\Auth\CsvController;
use App\Http\Controllers\ProfileController as ControllersProfileController;
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

Route::resource('profile', ProfileController::class)
->middleware(['auth:users', 'verified']);

Route::get('profile/create/{id}/{form_type}', [ProfileController::class,'create'])->name('create')
->middleware(['auth:users', 'verified']);

Route::get('profile/create',[ProfileController::class,'createExperiment'])->name('create.experiment')
->middleware(['auth:users', 'verified']);

Route::post('profile', [ProfileController::class, 'store'])->name('store');

Route::resource('search', SearchController::class)
->middleware(['auth:users', 'verified']);

Route::get('csv/csv-export', [CsvController::class, 'exportCsv'])->name('csv.export');

ROute::get('csv/csv-show', [CsvController::class, 'show'])->name('csv.show');


Route::get('/', function () {
    return view('user.welcome');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth:users', 'verified'])->name('dashboard');


// Route::middleware('auth:users')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



require __DIR__.'/auth.php';
