<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::controller(AdminController::class)->group(function () {
    Route::view('admin-login', 'admin-login');
    Route::post('admin-login', 'login');

       // 👇 yaha group bana ke middleware lagaya h
    Route::middleware('CheckAdminAuth')->group(function(){
    Route::get('dashboard', 'dashboard');
    Route::get('admin-categories', 'categories');
    Route::get('admin-logout', 'logout');
    Route::post('add-category', 'addcategory');
    Route::get('category/delete/{id}', 'deletecategory');
    Route::match(['get', 'post'], 'add-quiz', 'addquiz');
    Route::post('add-mcq', 'addmcqs');
    Route::get('end-quiz', 'endquiz');
    Route::get('show-quiz/{id}/{quizName}', 'showquiz')->name('show.quiz');
    Route::get('quiz-list/{id}/{category}', 'quizlist'); 
    });
});



Route::controller(UserController::class)->group(function () {
    Route::get('/', 'welcome');

    //  group bana ke middleware lagaya h
    Route::middleware('CheckUserAuth')->group(function(){
        Route::get('user-details', 'userdetails');
        Route::get('/mcq/{id}/{name}', 'mcq');
        Route::post('/submit-next/{id}', 'submitnext');
    });

    Route::get('/user-quiz-list/{id}/{category}', 'userquizlist');
    Route::get('/start-quiz/{id}/{name}', 'startquiz');
    Route::get('/user-signup',function(){
    if(!session()->has('user')){
       return view('user-signup');
    }else{
        return redirect('/');
    }
    });
    //Route::view('/user-signup', 'user-signup');
    Route::post('/user-signup', 'usersignup');

    Route::get('/user-logout', 'userlogout');
    Route::get('/user-quiz-start', 'quizstart');
    Route::get('/user-login',function(){
    if(!session()->has('user')){
       return view('user-login');
    }else{
        return redirect('/');
    }
    });
    //Route::view('/user-login', 'user-login');
    Route::post('/user-login', 'userlogin');
   
    Route::get('/user-login-quiz', 'userloginquiz');
    Route::get('/user-quiz-search', 'searchquiz');

    Route::get('/verify-user/{email}', 'verifyUser');
    Route::view('/user-forgot-password','user-forgot-password');

    Route::post('/user-forgot-password', 'userforgotpassword');
    Route::get('/user-forgot-password/{email}', 'userresetforgotpassword');
    Route::post('/user-set-password', 'usersetpassword');
    Route::get('/categories-list', 'categories');
    Route::get('/certificate', 'certificate');
    Route::get('/download-certificate', 'downloadcertificate');
});
