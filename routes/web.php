<?php

// LastGrade\contactform\src\routes\web.php
Route::group(['namespace' => 'LastGrade\ContactForm\Http\Controllers', 'middleware' => ['web']], function(){
	Route::get('contact', 'ContactFormController@index');
	Route::post('contact', 'ContactFormController@sendMail')->name('contact');
});
