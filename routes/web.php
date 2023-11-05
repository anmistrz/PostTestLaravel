<?php

use Illuminate\Support\Facades\Route;
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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/dashboard/create/post', 'PostController@create')
    ->middleware(['auth'])
    ->name('dashboard.create.post');

Route::post('/dashboard/create/store', 'PostController@store')
    ->middleware(['auth']);

    Route::post('/dashboard/post/update', 'PostController@update')
    ->middleware(['auth']);

Route::get('/dashboard/post/edit/{edit}', 'PostController@edit')
    ->middleware(['auth'])
    ->name('dashboard.post.edit');

Route::get('/dashboard/post/delete/{id}', 'PostController@destroy')
    ->middleware(['auth'])
    ->name('dashboard.post.delete');


Route::get('/dashboard/detail/{id}', 'PostController@show')
    ->middleware(['auth'])
    ->name('dashboard.detail');

Route::get('/dashboard/comment/edit/{id}', 'CommentController@edit')
    ->middleware(['auth'])
    ->name('dashboard.comment.edit');

Route::post('/dashboard/comment/update', 'CommentController@update')
    ->middleware(['auth']);


Route::get('/dashboard/comment/delete/{id}', 'CommentController@destroy')
    ->middleware(['auth'])
    ->name('dashboard.comment.delete');

    
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');



require __DIR__.'/auth.php';

