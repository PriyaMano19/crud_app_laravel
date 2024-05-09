<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController; 
use App\Http\Controllers\RegisterController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', [EmployeeController::class, 'index']);
Route::post('/addemployee', [EmployeeController::class, 'add']);
Route::get('/delete/{id}', [EmployeeController::class, 'delete']);
Route::get('/edit/{id}', [EmployeeController::class, 'edit']);
Route::post('/edit/{id}', [EmployeeController::class, 'update']);

Route::get('/register', [RegisterController::class, 'register']);
Route::post('/addregister', [RegisterController::class, 'addregister']);
Route::get('/userlist', [RegisterController::class, 'userlist']);
Route::get('/profile', [RegisterController::class, 'profile'])->name('profile');
//Route::post('/updateimage/{id}', [RegisterController::class, 'updateimage']);
Route::post('/editprofile/{id}', [RegisterController::class, 'updateprofile']);
Route::get('/deleteprofile/{id}', [RegisterController::class, 'deleteprofile']);
Route::get('/', [RegisterController::class, 'loginform']);
Route::post('/login', [RegisterController::class, 'login'])->name('login');