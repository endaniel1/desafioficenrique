<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\DocumentFileController;
use App\Http\Controllers\EntrepreneurshipController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    /* Route Item */
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items/store', [ItemController::class, 'store'])->name('items.store');
    Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/{item}/update', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{item}/delete', [ItemController::class, 'delete'])->name('items.delete');

    /* Route Commune */
    Route::get('/communes', [CommuneController::class, 'index'])->name('communes.index');
    Route::get('/communes/create', [CommuneController::class, 'create'])->name('communes.create');
    Route::post('/communes/store', [CommuneController::class, 'store'])->name('communes.store');
    Route::get('/communes/{commune}/edit', [CommuneController::class, 'edit'])->name('communes.edit');
    Route::put('/communes/{commune}/update', [CommuneController::class, 'update'])->name('communes.update');
    Route::delete('/communes/{commune}/delete', [CommuneController::class, 'delete'])->name('communes.delete');

    /* Route Document Files */
    Route::get('/document_files', [DocumentFileController::class, 'index'])->name('document_files.index');
    Route::get('/document_files/create', [DocumentFileController::class, 'create'])->name('document_files.create');
    Route::post('/document_files/store', [DocumentFileController::class, 'store'])->name('document_files.store');
    Route::get('/document_files/{document_file}/edit', [DocumentFileController::class, 'edit'])->name('document_files.edit');
    Route::put('/document_files/{document_file}/update', [DocumentFileController::class, 'update'])->name('document_files.update');
    Route::delete('/document_files/{document_file}/delete', [DocumentFileController::class, 'delete'])->name('document_files.delete');
    
    /* Route Entrepreneurship */
    Route::get('/entrepreneurships/create', [EntrepreneurshipController::class, 'create'])->name('entrepreneurships.create');
    Route::post('/entrepreneurships/store', [EntrepreneurshipController::class, 'store'])->name('entrepreneurships.store');
    Route::get('/entrepreneurships/{entrepreneurship}/previous', [EntrepreneurshipController::class, 'previous'])->name('entrepreneurships.previous');
    Route::get('/entrepreneurships/{entrepreneurship}/edit', [EntrepreneurshipController::class, 'edit'])->name('entrepreneurships.edit');
    Route::put('/entrepreneurships/{entrepreneurship}/update', [EntrepreneurshipController::class, 'update'])->name('entrepreneurships.update');
    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
