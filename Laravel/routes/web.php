<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Mail;

use \App\Http\Controllers\ContactFormController;

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
    return view('index');
});

Route::post('/contact-us-form/submit', [ContactFormController::class, 'submit']);
Route::post('/contact-us-form/reload', [ContactFormController::class, 'reloadCaptcha']);

Route::get('/email', function (){

    return new \App\Mail\ContactUs(['name' => 'bitch' , 'email' => 'test@gmail.com', 'phone' => '', 'subject' => '',  'message' => 'asfjakldjklajdkljfasfklfjdskf']);
});
