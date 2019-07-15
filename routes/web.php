<?php

// Kruxsoft\contactform\src\routes\web.php
Route::get('contact', function(){
	return view('contactform::contact');
});

Route::post('contact', function(){
	// logic goes here
})->name('contact');

// Kruxsoft\contactform\src\routes\web.php
Route::group(['namespace' => 'Kruxsoft\ContactForm\Http\Controllers', 'middleware' => ['web']], function(){
	Route::get('contact', 'ContactFormController@index');
	Route::post('contact', 'ContactFormController@sendMail')->name('contact');
});
