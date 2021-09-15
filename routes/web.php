<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Models\Question;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'examNotTaken', 'checkQuote'])->name('dashboard');

Route::get('/exam', [QuestionController::class, 'index'])->middleware(['auth', 'examTaken', 'checkQuote'])->name('exam');

Route::post('/exam', [UserController::class, 'editScore'])->middleware(['auth', 'examTaken', 'checkQuote']);

Route::get('/quotes', [DashboardController::class, 'getQuote'])->middleware(['auth', 'examNotTaken', 'isAdmin'])->name('getQuote');

Route::post('/quotes/add', [DashboardController::class, 'addQuotes'])->middleware(['auth', 'examNotTaken', 'isAdmin'])->name('addQuotes');

Route::delete('/quotes/delete/{id}', [DashboardController::class, 'deleteQuotes'])->middleware(['auth', 'examNotTaken', 'isAdmin'])->name('addQuotes');

Route::get('/user/settings', [DashboardController::class, 'settingsIndex'])->middleware(['auth', 'examNotTaken', 'checkQuote'])->name('settings');

Route::patch('/user/{id}/settings', [UserController::class, 'update'])->middleware(['auth', 'examNotTaken', 'checkQuote']);

// Route::get('/admintest', function () {
//     return "string";
// })->middleware(['auth','isAdmin']);

require __DIR__.'/auth.php';
