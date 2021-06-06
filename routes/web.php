<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Front\CommentController as FrontCommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Front\PostController as FrontController;
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

Route::get('/',[FrontController::class,'index'])->middleware('auth');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function (){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::prefix('category')->name('category')->middleware('roles')->group(function (){
      Route::get('/',[CategoryController::class,'index']);
      Route::get('/create',[CategoryController::class,'create'])->name('.create');
      Route::post('/store',[CategoryController::class,'store'])->name('.store');
      Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('.edit');
      Route::post('/update/{id}',[CategoryController::class,'update'])->name('.update');
      Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('.delete');
  });
    Route::prefix('posts')->name('post')->group(function (){
        Route::get('/',[PostController::class,'index']);
        Route::get('/create',[PostController::class,'create'])->name('.create');
        Route::post('/store',[PostController::class,'store'])->name('.store');
        Route::get('/edit/{id}',[PostController::class,'edit'])->name('.edit');
        Route::post('/update/{id}',[PostController::class,'update'])->name('.update');
        Route::get('/delete/{id}',[PostController::class,'destroy'])->name('.delete');
        Route::get('/change/{id}',[PostController::class,'status'])->name('.status');
    });
    Route::prefix('comments.')->name('comment.')->group(function (){
        Route::get('/',[CommentController::class,'index'])->name('index');
        Route::get('/delete/{id}',[CommentController::class,'destroy'])->name('delete');
        Route::get('/change/{id}',[CommentController::class,'status'])->name('status')->middleware('roles');
    });

});

Route::prefix('front')->name('front.')->group(function (){
    Route::name('posts.')->group(function (){
        Route::get('/post',[FrontController::class,'index'])->name('index');
        Route::get('/post/show/{id}',[FrontController::class,'show'])->name('show');
        Route::get('/create',[FrontController::class,'create'])->name('create');
        Route::post('/store',[FrontController::class,'store'])->name('store');
   });
    Route::name('category')->prefix('category')->group(function (){
        Route::get('/',[CategoryController::class,'show']);
    });
    Route::name('comments.')->prefix('comments')->group(function (){
        Route::get('/create/{post_id}',[FrontCommentController::class,'create'])->name('create');
        Route::post('/store',[FrontCommentController::class,'store'])->name('store');
    });
});

Route::prefix('profile')->name('profile.')->middleware('auth')->group(function (){
    Route::get('profile/{id}',[ProfileController::class,'show'])->name('index');
    Route::post('update/{id}',[ProfileController::class,'update'])->name('update');
    Route::get('index',[ProfileController::class,'index'])->name('index')->middleware('roles');
    Route::get('activity/{id}',[ProfileController::class,'activity'])->name('activity')->middleware('roles');
    Route::get('create',[ProfileController::class,'create'])->name('create')->middleware('roles');
    Route::post('store',[ProfileController::class,'store'])->name('store')->middleware('roles');
});




require __DIR__.'/auth.php';
