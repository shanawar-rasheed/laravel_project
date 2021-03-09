<?php
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::Post('/authentication/save',[MainController::class,'save'])->name('authentication.save');

Route::Post('/authentication/check',[MainController::class,'check'])->name('authentication.check');


Route::get('/authentication/login',[MainController::class,'login'])->name('authentication.login');

Route::get('/authentication/register',[MainController::class,'register'])->name('authentication.register');


Route::get('/authentication/logout',[MainController::class,'logout'])->name('authentication.logout');

Route::group(['middleware'=>['AuthCheck']],function(){

    
   
    
    Route::get('/greeting', function () {
        return 'Hello World';
    });


Route::get('/add-post',[PostController::class,'addPost']);

//Route::get('/page1',[PostController::class,'page1']);
Route::get('/page1',"App\Http\Controllers\PostController@page1");
Route::get('/page2',"App\Http\Controllers\PostController@page2");


//Route::get('/page2',[PostController::class,'page2']);
Route::get('/page3',[PostController::class,'page3']);

Route::post('/create-post',[PostController::class,'createPost'])->name('post.create');

Route::get('/posts',[PostController::class,'getPost']);

Route::get('/posts/{id}',[PostController::class,'getPostById']);

Route::get('/delete-post/{id}',[PostController::class,'deletePost']);

Route::get('/edit-post/{id}',[PostController::class,'showeditPost']);

Route::Post('/update-post',[PostController::class,'updatePost'])->name('post.update');


});


