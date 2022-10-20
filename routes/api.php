<?php

use App\Http\Controllers\API\ApiController;
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

Route::group([], function () {
    Route::get('/students', [ApiController::class, 'getStudentList']);
    Route::get('/majors', [ApiController::class, 'getMajorList']);
    Route::post('/students/create', [ApiController::class, 'addStudent']);
    Route::get('/students/{id}/edit', [ApiController::class, 'getStudentById']);
    Route::delete('/students/{id}', [ApiController::class, 'destroyStudent']);
    Route::put('/students/{id}/update', [ApiController::class, 'updateStudent']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
