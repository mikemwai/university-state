<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Gets data about the student
Route::get("list",[App\Http\Controllers\StudentController::class,'list']); 

//Gets data about the subject
Route::get("view",[App\Http\Controllers\SubjectController::class,'view']); 

//Posts new subject information to the database
Route::post("add",[App\Http\Controllers\SubjectController::class,'add']);
