<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Security\Core\Role\Role;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::controller(UrlController::class)->group(function ()
{
    Route::get('/', 'redirectUrl');
    Route::middleware(['jwt.auth'])->group(function () 
    {
        Route::post('/url', 'shortUrl');
        Route::get('/getAllUrl', 'getAllUrls');
        Route::post('/deleteUrl', 'deleteUrl');
        Route::get('/getUrl', 'getUrl');
    });
});

Route::controller(AuthController::class)->group(function ()
{
    Route::post('/login', 'login');
    Route::middleware(['jwt.auth'])->group(function () 
    {
        Route::post('/logout', 'logout');
        Route::post('/refresh', 'refresh');
        Route::get('/me', 'me');
    });
});
Route::controller(UserController::class)->group(function () 
{
    Route::post('/register', 'register');
    Route::middleware(['jwt.auth'])->group(function () 
    {
        Route::get('/getUser', 'getUser');
    });
});

