<?php

use App\Http\Controllers\Dashboard\Auth\AuthController;
use App\Http\Controllers\Dashboard\Auth\ProfileController;
use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\ContactsController;
use App\Http\Controllers\Dashboard\FreeQuoteController;
use App\Http\Controllers\Dashboard\ProjectsController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\website\HomeController;
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




Route::get('/login', function () {
    return view('Dashboard.auth.login');
})->name('login');

Route::post('/login',[AuthController::class,'login'])->name('login.post');

Route::get('logout',[AuthController::class,'logout'])->name('logout');



Route::group(['middleware'=>'auth:web','prefix'=>'admin'],function (){

    Route::get('/', function () {
        return view('Dashboard.home');
    })->name('dashboard');



        Route::delete('/projects/deleteAll',[ProjectsController::class,'deleteAll'])->name('delete.all');
        Route::get('/projects/details/{id}',[ProjectsController::class,'projectDetails'])->name('project.details');
        Route::delete('/projects/details/{id}',[ProjectsController::class,'deleteProjectDetails'])->name('project.details.delete');
        Route::post('/projects/details/{id}',[ProjectsController::class,'storeProjectDetails'])->name('project.details.store');
        Route::put('/projects/details/{id}',[ProjectsController::class,'updateProjectDetails'])->name('project.details.update');

        Route::post('/projects/attach/{id}',[ProjectsController::class,'storeProjectAttach'])->name('project.attach.store');
        Route::put('/projects/attach/{id}',[ProjectsController::class,'updateProjectAttach'])->name('project.attach.update');
        Route::delete('/projects/attach/{id}',[ProjectsController::class,'deleteProjectAttach'])->name('project.attach.delete');



    Route::resource('/projects',ProjectsController::class);


    Route::group(['controller'=>ContactsController::class],function (){

        Route::get('contacts','index')->name('admin.contacts.index');
        Route::get('contacts/{id}','destroy')->name('contact.destroy');
        Route::delete('contactsDeleteAll','deleteAll')->name('contact.deleteAll');
        Route::post('contacts-mail-replay/{id}','contactReplay')->name('contact.replay.mail');



    });

    Route::group(['controller'=>FreeQuoteController::class],function (){

        Route::get('free-qoutes','index')->name('free.qoute.index');
        Route::get('free-qoutes/{id}','destroy')->name('free.qoute.destroy');
        Route::delete('qoutesDeleteAll','deleteAll')->name('free.qoute.deleteAll');
        Route::get('free-quotes-notify','notifyUsersFreeQuote')->name('free.quote.report.index');
        Route::post('free-quotes-notify','sendNotifyUsersFreeQuote')->name('free.quote.report.send');



    });


//    categories
    Route::delete('categoryDeleteAll',[CategoryController::class,'deleteAll'])->name('category.delete.all');
    Route::resource('category',CategoryController::class);


    //    blogs
    Route::delete('blogDeleteAll',[BlogController::class,'deleteAll'])->name('blog.delete.all');
    Route::get('blog/delete/{id}',[BlogController::class,'delete'])->name('blog.item.delete');
    Route::resource('blog',BlogController::class);

    // profile
    Route::group(['controller'=>ProfileController::class],function () {

        Route::get('profile', 'index')->name('profile.index');
        Route::post('profile', 'update')->name('profile.update');


    });

    // subscriptions
    Route::group(['controller'=>SubscriptionController::class],function (){

        Route::get('subscripe','index')->name('subscripe.index');
        Route::delete('subscripe','deleteALL')->name('subscripe.delete.all');
        Route::get('subscripe/{id}','destroy')->name('subscripe.destroy');



    });

    //settings
    Route::group(['controller'=>SettingController::class],function (){

        Route::get('setting','index')->name('setting.index');
        Route::post('setting/about','about')->name('setting.about');
        Route::post('setting/meta','meta')->name('setting.meta');
        Route::post('setting/contact','contactInfo')->name('setting.contact');


    });





});

