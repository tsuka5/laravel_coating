<?php

// use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\SearchController;
use App\Http\Controllers\Auth\CsvController;
use App\Http\Controllers\Auth\DetailController;
use App\Http\Controllers\Auth\CategoryController;
use App\Http\Controllers\Auth\ContactController;

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
//dashboardについて
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/pdf-download', [PDFController::class, 'downloadPDF'])->name('pdf.download');
//profileについて
Route::resource('profile', ProfileController::class)
->middleware(['auth:users', 'verified']);

Route::get('profile/create/{id}/{form_type}', [ProfileController::class,'create'])->name('create')
->middleware(['auth:users', 'verified']);

Route::get('profile/create',[ProfileController::class,'createExperiment'])->name('create.experiment')
->middleware(['auth:users', 'verified']);

Route::post('profile', [ProfileController::class, 'store'])->name('store');

//detailについて
Route::get('detail/index', [DetailController::class, 'index'])->name('detail.index');

Route::get('detail/create/{formType}', [DetailController::class, 'create'])->name('detail.create');

Route::post('detail', [DetailController::class, 'store'])->name('detail.store');

//searchについて
Route::resource('search', SearchController::class)
->middleware(['auth:users', 'verified']);

//categoryについて
Route::get('category/index', [CategoryController::class, 'index'])->name('category.index');

Route::get('category/show/{id}/{category_type}', [CategoryController::class, 'show'])->name('category.show');

//contactについて
Route::get('contact/index', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact/index', [ContactController::class, 'store'])->name('contact.store');
Route::get('contact/show/{id}', [ContactController::class, 'show'])->name('contact.show');

//csvについて
// Route::get('csv/csv-export', [CsvController::class, 'exportCsv'])->name('csv.export');

// ROute::get('csv/csv-show', [CsvController::class, 'show'])->name('csv.show');


Route::get('/', function () {
    return view('user.welcome');
});

// Route::get('/dashboard', function () {
//     return view('user.dashboard');
// })->middleware(['auth:users', 'verified'])->name('dashboard');


// Route::middleware('auth:users')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



require __DIR__.'/auth.php';
