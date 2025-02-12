<?php
use App\Http\Controllers\HomeLandController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/user/{id}', function (string $id) {
    return 'User '.$id;
});


//Simbolo de interrogación indica que es un parametro opcional
Route::get('/hello/{name?}', function (string $name = 'pepee') {
    return 'Hello '.$name . ',Welcome to Laravel ';
});

//
Route::get('/services', [SiteController::class, 'services']);
//

Route::get('/', [HomeLandController::class, 'index']);
Route::get('/buy',[HomeLandController::class, 'buy']);
Route::get('/rent',[HomeLandController::class, 'rent']);
Route::get('/properties/{property_type_id}',[HomeLandController::class, 'properties']);
Route::get('/about',[HomeLandController::class, 'about']);
Route::get('/contact',[HomeLandController::class, 'contact']);
Route::get('/login',[HomeLandController::class, 'login']);
Route::get('/register',[HomeLandController::class, 'register']);
