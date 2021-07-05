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
//Route to display the photo form
Route::get('/photos/new', [PhotoController::class,'create']);
//Route to display the edit form
Route::get('/photos/edit/{id}', [PhotoController::class,'edit']);

//Route to insert in database a new photo
Route::post('/photos',[PhotoController::class,'store']);

//Route to update an photo in database
Route::put('/photos/{id}', [PhotoController::class,'update']);
