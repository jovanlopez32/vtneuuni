<?php

use App\Http\Controllers\OpenIAController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

/* Vocational Test Screens */
Route::middleware('web')->group(function () {
    Route::get('/testvocacional', [TestController::class, 'questions'])->name('test.questions');
    Route::get('/resultado', [TestController::class, 'answer'])->name('test.answer');


    Route::post('/processanswer', [TestController::class, 'processAnswer'])->name('test.process.answer');

    Route::get('/cleansession', [TestController::class, 'cleanS'])->name('test.clean.session');
});

/* Open IA Functions */
Route::middleware('web')->group(function () {
    Route::post('/textcomplete', [OpenIAController::class, 'textCompleteVT'])->name('openia.textcompletevt');
    Route::post('/processquestion', [OpenIAController::class, 'textResponseQuestion'])->name('openia.textresponseq');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
