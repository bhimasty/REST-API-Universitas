<?php

use App\Http\Controllers\API\FacultyController;
use App\Http\Controllers\API\DepartmentController;
use App\Http\Controllers\API\OutputController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\TransactionController;
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

Route::get('/faculties', [FacultyController::class, 'index']);
Route::post('/faculties/store', [FacultyController::class, 'store']);
Route::get('/faculties/show/{id}', [FacultyController::class, 'show']);
Route::post('/faculties/update/{id}', [FacultyController::class, 'update']);
Route::get('/faculties/destroy/{id}', [FacultyController::class, 'destroy']);

Route::get('/departments', [DepartmentController::class, 'index']);
Route::post('/departments/store', [DepartmentController::class, 'store']);
Route::get('/departments/show/{id}', [DepartmentController::class, 'show']);
Route::post('/departments/update/{id}', [DepartmentController::class, 'update']);
Route::get('/departments/destroy/{id}', [DepartmentController::class, 'destroy']);

Route::get('/subjects', [SubjectController::class, 'index']);
Route::post('/subjects/store', [SubjectController::class, 'store']);
Route::get('/subjects/show/{id}', [SubjectController::class, 'show']);
Route::post('/subjects/update/{id}', [SubjectController::class, 'update']);
Route::get('/subjects/destroy/{id}', [SubjectController::class, 'destroy']);

Route::get('/students', [StudentController::class, 'index']);
Route::post('/students/store', [StudentController::class, 'store']);
Route::get('/students/show/{id}', [StudentController::class, 'show']);
Route::post('/students/update/{id}', [StudentController::class, 'update']);
Route::get('/students/destroy/{id}', [StudentController::class, 'destroy']);

Route::get('/transactions', [TransactionController::class, 'index']);
Route::post('/transactions/store', [TransactionController::class, 'store']);
Route::get('/transactions/show/{id}', [TransactionController::class, 'show']);
Route::post('/transactions/update/{id}', [TransactionController::class, 'update']);
Route::get('/transactions/destroy/{id}', [TransactionController::class, 'destroy']);

Route::get('/output1/{student}', [OutputController::class, 'output1']);
Route::get('/output2/{subject}', [OutputController::class, 'output2']);
Route::get('/output3/{department}', [OutputController::class, 'output3']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
