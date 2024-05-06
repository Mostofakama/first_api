<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriContorller;





Route::apiResource('categori',CategoriContorller::class);

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::resource('catagori',CatagoriController::class);

// Route::get('user',function(){
// return response()->json([
//     'message' => 'data successfull',
// ]);
// });