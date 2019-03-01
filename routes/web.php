<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/
/*Route::post('/login', 'LoginController@login');
Route::get('/logout','LoginController@logout');
Route::get('postTracking','LoginController@postTracking');
Route::get('/', function () {
	if(Auth::user()){

	     return redirect('/postTracking');
	}else{
	     return view('login');
	}
   
});*/
Route::get('/','HomeController@index');
Route::get('/admin/viewEnquiryDetails','HomeController@enquiryList');

Route::get('courses/{course}','HomeController@course');
Route::get('services/{service}','HomeController@service');
Route::post('enquirysubmission','HomeController@submitEnquiry');
Route::get('reviews','HomeController@reviews');
Route::post('reviewsubmission','HomeController@submitReview');
Route::get('contact','HomeController@contact');
Route::get('career','HomeController@career');
Route::post('careersubmission','HomeController@submitCareer');
Route::get('about','HomeController@about');
Route::get('recentworks','HomeController@recentWorks');
Route::get('registration','HomeController@register');
Route::post('register','HomeController@submitRegistration');

