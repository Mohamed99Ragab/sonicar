<?php

use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\website\AboutController;
use App\Http\Controllers\website\BlogController;
use App\Http\Controllers\website\ContactUsController;
use App\Http\Controllers\website\FreeQuoteController;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\ProjectController;
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

Route::get('/', [HomeController::class,'index']);

Route::get('/about',[AboutController::class,'index'])->name('about');

Route::group(['controller'=>ProjectController::class,'index'],function (){

    Route::get('projects','index')->name('projects');

});


Route::group(['controller'=>ContactUsController::class],function (){


    Route::get('contact-us','index')->name('contactus');
    Route::post('contact-us','saveContact')->name('contactus.send');


});

Route::post('freeQuote',[FreeQuoteController::class,'saveFreeQuote'])->name('free.quote.send');


Route::group(['controller'=>BlogController::class],function () {

    Route::get('blogs','index');
    Route::get('blogs/{slug}','blogDetails')->name('blog.details');

    Route::post('blogs/search','search')->name('blog.search');
});



// subscriptions
Route::group(['controller'=>SubscriptionController::class],function (){

    Route::post('subscripe','store')->name('subscripe.store');




});

