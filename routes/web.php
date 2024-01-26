<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IncidenceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;


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
    return view('home');
});
Route::middleware(['auth'])->group(function () {
    Route::resources([
    '/' => HomeController::class,
    ]);
});
Route::middleware(['auth'])->group(function () {
    Route::resources([
    '/incidences' => IncidenceController::class,
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::resources([
    '/departments' => DepartmentController::class,
    ]);
});
Route::middleware(['auth'])->group(function () {
    Route::resources([
    '/categories' => CategoriesController::class,
    ]);
});
Route::middleware(['auth'])->group(function () {
    Route::resources([
    '/comments' => CommentsController::class,
    ]);
});
    Route::controller(IncidenceController::class)->group(function () {
        Route::get('/incidences', 'index')->name('incidences.index');
        Route::get('/incidences/{incidence}', 'show')->name('incidences.show');
        })->withoutMiddleware([Auth::class]);
    
    Route::controller(DepartmentController::class)->group(function () {
        Route::get('/departments', 'index')->name('departments.index');
        Route::get('/register', 'select')->name('auth.register');    
    })->withoutMiddleware([Auth::class]);
    
    Route::controller(CategoriesController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories.index');
        })->withoutMiddleware([Auth::class]);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

