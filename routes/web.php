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

/***********************Admin-Section****************************/
Route::get('admin/login','Admin\LoginController@login');
Route::post('admin/login','Admin\LoginController@authentication');
Route::get('admin/contact-us','Admin\AdminController@contact');
Route::get('admin/contact-us/{id}/contact-us-view','Admin\AdminController@contactusview');
Route::get('admin/contact-us/{id}/contact-us-reply','Admin\AdminController@contactusreply');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware'=>'adminAuth'],function(){
	Route::get('logout','LoginController@logout');
	
	Route::get('/home', 'DashboardController@index')->name('home');
	
	
	Route::group(['prefix' => 'ajax'],function(){
		Route::get('/associate', 'AssociateController@ajaxList');
	});

	Route::resource('courses', 'CourseController');
	Route::group(['prefix' => 'courses'],function(){
		Route::post('/status', 'CourseController@changeStatus');
	});

	Route::resource('agent', 'AgentController');
	Route::group(['prefix' => 'agent'],function(){
		Route::post('/status', 'AgentController@changeStatus'); 
	});

	Route::resource('project', 'ProjectController');
	Route::group(['prefix' => 'project'],function(){
		Route::post('/status', 'ProjectController@changeStatus');
	});

	Route::resource('training', 'TrainingController');
	Route::group(['prefix' => 'training'],function(){
		Route::post('/status', 'TrainingController@changeStatus');
	});

	Route::resource('project-payment', 'ProjectPaymentController');
	Route::group(['prefix' => 'project-payment'],function(){
		Route::post('/status', 'ProjectPaymentController@changeStatus');
	});

	Route::resource('subject', 'SubjectController');
	Route::group(['prefix' => 'subject'],function(){
		Route::post('/status', 'SubjectController@changeStatus');
	});


	Route::resource('batches', 'BatchController');
	Route::group(['prefix' => 'batches'],function(){
		Route::post('/status', 'BatchController@changeStatus');
	});

	Route::group(['prefix' => 'topics'],function(){
		Route::post('/status', 'TopicsController@changeStatus');
		Route::get('/course-list', 'TopicsController@courseList');
		Route::get('/subjectlist', 'TopicsController@subjectList');
	});
	Route::resource('topics', 'TopicsController');

	Route::resource('hospitals', 'HospitalController');
	Route::group(['prefix' => 'hospitals'],function(){
		Route::post('/status', 'HospitalController@changeStatus');
	});

	Route::resource('services', 'ServiceController');
	Route::group(['prefix' => 'services'],function(){
		Route::post('/status', 'ServiceController@changeStatus');
	});

	Route::resource('appointments', 'AppointmentController');
	Route::group(['prefix' => 'appointment'],function(){
		Route::post('/delete', 'AppointmentController@delete');
		//Route::resource('/', 'InvestorController');
	});
});