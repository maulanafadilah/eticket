<?php

use App\Http\Controllers\Apps\BugsController;
use App\Http\Controllers\Apps\TrackController;
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

Route::resource("/", BugsController::class);
Route::resource("/track", TrackController::class);

// Route::get('/track', function () {
//     return view('apps.track');
// });
