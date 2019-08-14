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






Auth::routes();
// Auth::routes(['verify' => true]);


Route::get('jobs/jobs_all', 'JobController@allJobs')->name('jobs.all');


Route::get('/', 'JobController@index');
Route::get('jobs/create', 'JobController@create')->name('job.create');
Route::post('jobs/create', 'JobController@store')->name('job.store');
Route::get('jobs/{id}/edit', 'JobController@edit')->name('jobs.edit');

Route::post('jobs/{id}/edit', 'JobController@update')->name('jobs.update');




Route::post('job/{id}/apply', 'JobController@apply')->name('job.apply');

Route::get('/jobs/{id}/{job}', 'JobController@show')->name('jobs.show');
Route::get('/jobs/applications', 'JobController@applicant')->name('jobs.applicant');
Route::get('/jobs/myapplications', 'JobController@myapplications')->name('jobs.myapp');







Route::get('/home', 'HomeController@index')->name('home');

Route::get('/company/{id}/{company}', 'CompanyController@index')->name('company.index');
Route::get('/company/{id}/{company}/myjobs', 'CompanyController@myjobs')->name('company.myjobs');
Route::get('/company/create','CompanyController@create')->name('company.view');
Route::post('/company/create','CompanyController@store')->name('company.create');
Route::post('/company/logo', 'CompanyController@logo')->name('logo');
Route::post('/user/coverphoto', 'CompanyController@coverphoto')->name('cover.photo');



Route::get('/user/profile', 'UserController@index');
Route::post('/user/profile/create', 'UserController@store')->name('profile.create');
Route::post('/user/coverletter', 'UserController@coverletter')->name('cover.letter');
Route::post('/user/resume', 'UserController@resume')->name('resume');
Route::post('/user/avatar', 'UserController@avatar')->name('avatar');
Route::get('/applicat/{id}/details', 'UserController@applicantdetails')->name('applicant.details');

Route::view('/employer/register','auth.employer-register')->name('employer.register');
Route::post('/employer/register','EmployerRegisterController@employerRegister')->name('emp.register');


