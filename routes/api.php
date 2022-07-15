<?php

use App\Http\Controllers\AlumnoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/alumnos', [AlumnoController::class,'index']);
Route::post('/alumnos', [AlumnoController::class,'create']);
Route::put('/alumnos/{id}', [AlumnoController::class,'update']);
Route::get('/alumnos/{id}', [AlumnoController::class,'show']);
Route::delete('/alumnos/{id}', [AlumnoController::class,'delete']);

#en multiples gets 
Route::get('/genero', [AlumnoController::class,'genero']);
Route::get('/becados', [AlumnoController::class,'becados']);
Route::get('/horario', [AlumnoController::class,'horario']);
Route::get('/promedio', [AlumnoController::class,'promedio']);
Route::get('/problemas_salud', [AlumnoController::class,'problemas_salud']);


#en unos solo get mas vale prevenir
Route::get('/estadisticas', [AlumnoController::class,'estadisticas']);