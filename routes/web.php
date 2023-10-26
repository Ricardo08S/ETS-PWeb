<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'dashboard']);
// Route::get('/register', [AuthController::class, 'register']);
// Route::post('/register', [AuthController::class, 'registered']);
// Route::get('/welcome', [AuthController::class, 'welcome']);

// Route::get('/table', function(){
//     return view(('page.table'));
// });

// Route::get('/data-table', function(){
//     return view('page.datatable');
// });

// Route::get('/master', function(){
//     return view('layouts.master');
// });

Route::group(['middleware' => ['auth']], function () {

    // CRUD

    // Create Data
    // Route that routing to the add data form
    Route::get('/category/create', [CategoriesController::class, 'create']);
    // Route to add data to the database
    Route::post('/category', [CategoriesController::class, 'store']);

    // Read Data
    // Route to display all categories
    Route::get('/category', [CategoriesController::class, 'index']);
    // Route for category details by id
    Route::get('/category/{id}', [CategoriesController::class, 'show']);

    // Update Data
    // Route to the edit data form with id params
    Route::get('/category/{id}/edit', [CategoriesController::class, 'edit']);
    // Route to update data in the database based on id
    Route::put('/category/{id}', [CategoriesController::class, 'update']);

    // Delete Data
    Route::delete('category/{id}', [CategoriesController::class, 'destroy']);
});

// CRUD News
Route::resource('news', NewsController::class);

Auth::routes();
