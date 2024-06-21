<?php

use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\SearchController;
use App\Http\Controllers\Auth\DetailController;
use App\Http\Controllers\Auth\CategoryController;
use App\Http\Controllers\Auth\ContactController;
use App\Http\Controllers\Auth\TableShowController;
use App\Http\Controllers\Auth\ChartShowController;
use App\Http\Controllers\Auth\ExcelController; 
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
    Route::post('profile/experimentStore', [ProfileController::class, 'storeExperiment'])->name('store.experiment');
    Route::get('profile/show/{id}', [ProfileController::class,'show'])->name('profile.show');
    Route::delete('profile/deleteExperiment/{id}', [ProfileController::class, 'destroyExperiment'])->name('profile.destroy.experiment');
    Route::post('profile/create_composition/{experiment_id}', [ProfileController::class, 'createComposition'])->name('profile.create.composition');
    Route::post('profile/create_composition/{experiment_id}/{composition_id}', [ProfileController::class, 'createCopy'])->name('profile.create.copy_composition');
    //experiment_registerについて
    Route::get('profile/experiment/{experiment_id}', [ProfileController::class,'experimentIndex'])->name('experiment_register');
    Route::delete('profile/experiment/{experiment_id}/{type}/{id}', [ProfileController::class, 'destroyData'])->name('destroy.data');
    Route::get('profile/experiment/{editType}/{id}', [ProfileController::class, 'editExperiment'])->name('edit.experiment');
    Route::put('profile/experiment/{editType}/{id}', [ProfileController::class, 'updateExperiment'])->name('update.experiment');

    

    //detailについて
    Route::get('detail/index', [DetailController::class, 'index'])->name('detail.index');
    Route::get('detail/create/{formType}', [DetailController::class, 'create'])->name('detail.create');
    Route::post('detail', [DetailController::class, 'store'])->name('detail.store');

    //searchについて
    Route::resource('search', SearchController::class)
    ->middleware(['auth:users', 'verified']);
    Route::get('search/experiment/{experiment_id}', [SearchController::class,'experimentIndex'])->name('experiment_show');
    Route::get('search/experiment/{type}/{id}', [SearchController::class, 'experimentDetailShow'])->name('experiment_detail_show');
    Route::get('search/{type}/{item}', [SearchController::class, 'compareWholeData'])->name('compareWholeData');
    Route::get('everyone_show/chart/{id}/{type}', [ChartShowController::class,'everyone_show'])->name('everyone_show.chart');
    Route::get('everyone_show/table/{id}/{type}', [TableShowController::class,'everyone_show'])->name('everyone_show.table');



    //categoryについて
    Route::get('category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('category/create/{categoryType}', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('category/show/{id}/{category_type}', [CategoryController::class, 'show'])->name('category.show');

    //contactについて
    Route::get('contact/index', [ContactController::class, 'index'])->name('contact.index');
    Route::post('contact/index', [ContactController::class, 'store'])->name('contact.store');
    Route::get('contact/show/{id}', [ContactController::class, 'show'])->name('contact.show');

    //ExcelOutputについて
    Route::get('/export-excel/{experiment_id}/{type}', [ExcelController::class, 'export'])->name('export.excel');
    //ExcelInputについて
    Route::post('/inport-excel/{type}', [ExcelController::class, 'store'])->name('import.excel');
    //ExcelEditOutputについて
    Route::get('/edit-excel/{experiment_id}/{type}', [ExcelController::class, 'edit_export'])->name('edit_export.excel');
    //TableShowについて
    Route::get('show/table/{id}/{type}', [TableShowController::class,'show'])->name('show.table');
    //ChartShowについて
    Route::get('show/chart/{id}/{type}', [ChartShowController::class,'show'])->name('show.chart');



});

Route::get('/', function () {
    return view('user.welcome');
});


require __DIR__.'/auth.php';


//csvについて
// Route::get('csv/csv-export', [CsvController::class, 'exportCsv'])->name('csv.export');

// ROute::get('csv/csv-show', [CsvController::class, 'show'])->name('csv.show');

