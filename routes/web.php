<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $phpVersion = PHP_VERSION;
    $laravelVersion = Application::VERSION;
    $canRegister = Route::has('register');
    $canLogin = Route::has('login');
    $URL = \route('def.test');
    return Inertia::render('Welcome', compact('phpVersion' ,'URL', 'laravelVersion','canLogin','canRegister'));
});
Route::get('/test/def' , function(){
    return Inertia::render('Test');
})->name('def.test');
Route::get('/test/url' , function(){
    return 'ok';
})->name('send.test');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
