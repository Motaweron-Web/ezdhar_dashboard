<?php

use Illuminate\Support\Facades\Route;



Route::group(['prefix'=>'admin'],function (){
    Route::get('login', 'AuthController@index')->name('admin.login');
    Route::POST('login', 'AuthController@login')->name('admin.login');
});

Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function (){
    Route::get('/', function () {
        return view('Admin/index');
    })->name('adminHome');

    #### Admins ####
    Route::resource('admins','AdminController');
    Route::POST('delete_admin','AdminController@delete')->name('delete_admin');
    Route::get('my_profile','AdminController@myProfile')->name('myProfile');


    #### Services ####
    Route::resource('services','ServiceController');
    Route::post('services.delete','ServiceController@delete')->name('services.delete');

    #### Categories ####
    Route::resource('categories','CategoryController');
    Route::POST('delete_category','CategoryController@delete')->name('delete_category');

    #### sub Categories ####
    Route::resource('subcategories','SubCategoryController');
    Route::POST('delete_subcategory','SubCategoryController@delete')->name('delete_subcategory');

    #### Setting ####
    Route::resource('settings','SettingController');
    Route::get('setting_about','SettingController@about')->name('setting.about');
    Route::post('setting_about_update/{id}','SettingController@updateabout')->name('update_about');
    Route::get('setting_terms','SettingController@terms')->name('setting.terms');
    Route::post('setting_terms_update/{id}','SettingController@updateterms')->name('update_terms');
    Route::get('setting_privacy','SettingController@privacy')->name('setting.privacy');
    Route::post('setting_privacy_update/{id}','SettingController@updateprivacy')->name('update_privacy');

    #### feasibility study ####
    Route::resource('feasibility_study','FeasibilityStudyController');
    Route::POST('delete_feasibility_study','FeasibilityStudyController@delete')->name('delete_feasibility_study');

    #### contact us ####
    Route::resource('contact_us','ContactUsController');
    Route::POST('delete_contact_us','ContactUsController@delete')->name('delete_contact_us');

    #### users ####
    Route::get('users_client','UsersController@client')->name('users_client');
    Route::post('users_client_delete','UsersController@client_delete')->name('users_client_delete');

    Route::get('users_freelancer','UsersController@freelancer')->name('users_freelancer');
    Route::post('users_freelancer_delete','UsersController@freelancer_delete')->name('users_freelancer_delete');

    Route::get('users_adviser','UsersController@adviser')->name('users_adviser');
    Route::post('users_adviser_delete','UsersController@adviser_delete')->name('users_adviser_delete');

















    #### Auth ####
    Route::get('logout', 'AuthController@logout')->name('admin.logout');



   ### Points #######


   Route::resource('points','PointController');
    Route::POST('delete_point','PointController@delete')->name('delete_point');






});










