<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertiesAPIController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/demo1', function () {
    return response()->json([
        'message' => 'Hello World!',
        'status' => 'Connected'
    ]);
});

Route::get('/properties', [PropertiesAPIController::class, 'properties'])->name('api.properties_list');
Route::get('/properties/datatables', [PropertiesAPIController::class, 'properties_datatables'])->name('api.properties_list_datatables');
Route::post('/contact_agent', [PropertiesAPIController::class, 'saveContact'])->name('api.contact_agent');
