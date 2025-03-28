<?php

use App\Http\Controllers\AdminPropertiesController;
use App\Http\Controllers\HomeLandController;
use App\Http\Controllers\EmployeesController;
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

Route::get('/', [HomeLandController::class, 'index'])->name('home'); //name('home') es un alias para la ruta, se usa para redireccionar a la ruta
Route::match(['get','post'],'/property_details/{property_id}',[HomeLandController::class, 'property_details'])->name('property_details');

Route::match(['get','post'],'/ratings/{property_id}',[HomeLandController::class, 'ratings'])->name('ratings');
Route::get('/buy',[HomeLandController::class, 'buy'])->name('buy');
Route::get('/rent',[HomeLandController::class, 'rent'])->name('rent');
Route::get('/properties/{property_listing_type_id}',[HomeLandController::class, 'properties_listing_type'])->name('properties_listing_type');
Route::get('/about',[HomeLandController::class, 'about'])->name('about');
//Route::match(['get','post'],'/contact_submit',[HomelandController::class, 'contact_submit'])->name('contact_submit');


//Route::get('/contact',[HomeLandController::class, 'contact_submit'])->name('contact');
//Route::post('/contact', [HomeLandController::class, 'contact_submit'])->name('contact_submit');

Route::match(['get','post'],'/contact',[HomeLandController::class, 'contact_submit'])->name('contact_submit');
Route::get('/login',[HomeLandController::class, 'login'])->name('login');
Route::get('/register',[HomeLandController::class, 'register'])->name('register');

Route::get('/admin/properties',[AdminPropertiesController::class, 'index'])->name('admin.properties.index');
Route::get('/admin/employees',[EmployeesController::class, 'index'])->name('employees.index');

Route::get('/admin/employees_fetch',[EmployeesController::class, 'employees_fetch'])->name('employees_fetch');
