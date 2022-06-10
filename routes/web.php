<?php

use App\Http\Controllers\DomainController;
use App\Http\Controllers\RecipientController;
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

Route::group([
    'middleware' => ['auth'],
], function () {

    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('domains', DomainController::class);

    Route::resource('recipients', RecipientController::class);
    Route::patch('recipients/{recipient}/change-status', [RecipientController::class, 'changeStatus'])
        ->name('recipients.change_status');
});

require __DIR__ . '/auth.php';