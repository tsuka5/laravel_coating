<?php

use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\SearchController;
use App\Http\Controllers\Auth\DetailController;
use App\Http\Controllers\Auth\CategoryController;
use App\Http\Controllers\Auth\ContactController;
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
Route::middleware('auth:users')->group(function () {
    //dashboardについて
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //profileについて
    Route::resource('profile', ProfileController::class)
    ->middleware(['auth:users', 'verified']);
    Route::get('profile/create/{id}/{form_type}', [ProfileController::class,'create'])->name('create');
    Route::get('profile/create/{type}',[ProfileController::class,'createExperiment'])->name('create.experiment');
    Route::post('profile', [ProfileController::class, 'store'])->name('store');
    Route::get('profile/show/{id}', [ProfileController::class,'show'])->name('profile.show');
    Route::delete('profile/deleteExperiment/{id}', [ProfileController::class, 'destroyExperiment'])->name('profile.destroy.experiment');
    Route::post('profile/create_composition/{experiment_id}', [ProfileController::class, 'createComposition'])->name('profile.create.composition');

    //detailについて
    Route::get('detail/index', [DetailController::class, 'index'])->name('detail.index');
    Route::get('detail/create/{formType}', [DetailController::class, 'create'])->name('detail.create');
    Route::post('detail', [DetailController::class, 'store'])->name('detail.store');

    //searchについて
    Route::resource('search', SearchController::class)
    ->middleware(['auth:users', 'verified']);

    //categoryについて
    Route::get('category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create/{categoryType}', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/show/{id}/{category_type}', [CategoryController::class, 'show'])->name('category.show');

    //contactについて
    Route::get('contact/index', [ContactController::class, 'index'])->name('contact.index');
    Route::post('contact/index', [ContactController::class, 'store'])->name('contact.store');
    Route::get('contact/show/{id}', [ContactController::class, 'show'])->name('contact.show');
});

Route::get('/', function () {
    return view('user.welcome');
});


require __DIR__.'/auth.php';


//csvについて
// Route::get('csv/csv-export', [CsvController::class, 'exportCsv'])->name('csv.export');

// ROute::get('csv/csv-show', [CsvController::class, 'show'])->name('csv.show');

