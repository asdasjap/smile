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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'examNotTaken'])->name('dashboard');

Route::get('/exam', [QuestionController::class, 'index'])->middleware(['auth', 'examTaken'])->name('exam');

Route::post('/exam', [UserController::class, 'editScore'])->middleware(['auth', 'examTaken']);

Route::get('/user/settings', [DashboardController::class, 'settingsIndex'])->middleware(['auth', 'examNotTaken'])->name('settings');

Route::patch('/user/{id}/settings', [UserController::class, 'update'])->middleware(['auth', 'examNotTaken']);

// Route::get('/admintest', function () {
//     return "string";
// })->middleware(['auth','isAdmin']);

require __DIR__.'/auth.php';
