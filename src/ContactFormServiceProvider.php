<?php
//
namespace LastGrade\ContactForm;

use Illuminate\Support\ServiceProvider;

class ContactFormServiceProvider extends ServiceProvider {
	
	public function boot()
	{
        $this->publishes([
            __DIR__.'/../config/contact.php' => config_path('contact.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/contact'),
        ], 'views');

	    $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
		
	    $this->loadViewsFrom(__DIR__.'/../resources/views', 'contactform');
		
	    $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

	}
	
	public function register()
	{
	
	    $this->mergeConfigFrom(
             __DIR__.'/../config/contact.php', 'contact'
        );
	}
}
