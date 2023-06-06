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
// Route::get('/', 'TestController@index');
Route::get('/', 'PageController@home')->name('home');
Route::get('/admin', 'PageController@admin');
Route::get('/about-us', 'PageController@about')->name('about');
Route::get('/services', 'PageController@service')->name('service');
Route::get('/service/{slug}', 'PageController@serviceDetail')->name('service-detail');
Route::get('/product/{slug}', 'PageController@productDetail')->name('product-detail');
Route::get('/blogs', 'PageController@blog')->name('blog');
Route::get('/blog/{slug}', 'PageController@blogDetail')->name('blog-detail');
Route::get('/contact-us', 'PageController@contact')->name('contact');
Route::post('/contact-form-action', 'PageController@contactFormAction')->name('contact-form-action');
Route::get('/faq', 'PageController@faq')->name('faq');
Route::get('/page/{slug}', 'PageController@cms')->name('page');
Route::get('/404', 'PageController@error404')->name('404');

//landing page
Route::get('/digital-transformation', 'PageController@digitalTransformation')->name('digital-transformation');
Route::post('/landing-form-action', 'PageController@landingFormAction')->name('landing-form-action');
Route::get('/{slug}', 'PageController@landingPage')->name('landing-page');