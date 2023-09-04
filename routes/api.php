<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TCandidateController;

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


Route::get('candidates', [TCandidateController::class, 'index']);
Route::get('candidates/{id}', [TCandidateController::class, 'show']);
Route::post('candidates', [TCandidateController::class, 'store']);
Route::put('candidates/{candidateId}', [TCandidateController::class, 'update']);
Route::delete('candidates/{id}', [TCandidateController::class, 'destroy']);
