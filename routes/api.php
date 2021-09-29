<?php

use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/test',function(Request $request){
    return 'Authenticated';
});

Route::middleware('auth:api')->prefix('v1')->group( function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // //author{author}
    // //one specific author::::::::using an api resource is the best way to go
    // Route::get('/authors/{author}',[AuthorsController::class,'show']);
  
    // //all authors
    // Route::get('/authors',[AuthorsController::class,'index']);
    ///approach below is BEST

    Route::apiResource('/authors',AuthorsController::class);    
    Route::apiResource('/books',BooksController::class);    

});


