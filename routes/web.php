<?php

use App\Http\Controllers\PhotoController;
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

//Route main page
Route::get('/', [PhotoController::class,'index']);
//Route that display the photo form
Route::get('/photos/new', [PhotoController::class, 'create']);

//Route that inserts in database a new photo
Route::post('/photos',[PhotoController::class,'store']);
