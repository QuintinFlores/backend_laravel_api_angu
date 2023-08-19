<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// // //rutas sin proteccion 
// Route::post("/auth/v1/login", [AuthController::class, "funIngresar"]);
// Route::post("/auth/v1/register", [AuthController::class, "funRegistro"]);
// Route::get("/auth/v1/profile", [AuthController::class, "funProfile"]);
// Route::post("/auth/v1/logout", [AuthController::class, "funSalir"]);   

//rutas con proteccion 

 route::prefix('v1/auth/')->group (function(){
    
    Route::post("/login", [AuthController::class, "funIngresar"]);
    Route::post("/register", [AuthController::class, "funRegistro"]);
 
    Route::middleware('auth:sanctum')->group(function(){
         Route::get("/profile", [AuthController::class, "funProfile"]);
        Route::post("/logout", [AuthController::class, "funSalir"]); 
    });
 });

