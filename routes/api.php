<?php

use App\Http\Controllers\AuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/** Agregado para inciar manejo con JWT */
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {

    //Route::post('login', 'App\Http\Controllers\AuthController@login');  // Iniciar sesión   
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', 'App\Http\Controllers\AuthController@register'); // Crear nuevo usuario

    /**
     * Grupo de Rutas con Verify
     */
    Route::group(['middleware' => ['jwt.verify']], function () {
        //Todo lo que este dentro de este grupo requiere verificación de usuario.
        
        // >>USER
        Route::get('mePerfil', [AuthController::class, 'perfil']); // Data User Login
        Route::post('upPerfil/{id}', [AuthController::class, 'upDataUser']); // Up data
        Route::post('logout', [AuthController::class, 'logout']); // Closed sesión

        // >>PERSONAJES    
        //Route::post('saveFav', [FavoritosController::class, 'store']); // Up dataphp    
        Route::post('saveFav', 'App\Http\Controllers\personajes\FavoritosController@store'); 

        
    });
});
