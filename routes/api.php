<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\ImagemController;
use App\Http\Controllers\CategoriaTagController;
use App\Http\Controllers\ExportImportController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\RegraController;
use App\Http\Controllers\TipoRegraController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\IconController;

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

//Route:: Account active and passwords
Route::post('/forgot', [SecurityController::class, 'forgot']);
Route::post('/forgot/resend', [SecurityController::class, 'resend']);
Route::put('/forgot/reset/password', [SecurityController::class, 'reset']);

//Route:: Auth
Route::group([
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);

});

//Route:: Users
Route::post('/user', [UserController::class, 'store']);

//Route:: Users
Route::group([
    'middleware' => 'JWT:ROOT,ADMIN,USER',
    'prefix' => 'user',
    'roles' => ['ROOT', 'ADMIN', 'USER']

], function ($router) {

    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('/filter/list', [UserController::class, 'search']);

    Route::put('/reset/password', [SecurityController::class, 'editPassword']);
    Route::patch('/', [UserController::class, 'edit']);
    Route::patch('/perfil/update', [UserController::class, 'update']);
    Route::patch('/status/update/{id}', [UserController::class, 'active']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});








