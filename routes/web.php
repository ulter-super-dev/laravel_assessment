<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BlogController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect('/blogs');
});


Route::middleware(["auth"])->group(function() {
    Route::resource('blogs', BlogController::class);
    Route::post("blogs/search", [BlogController::class, 'searchBlog']);
});

require __DIR__.'/auth.php';
