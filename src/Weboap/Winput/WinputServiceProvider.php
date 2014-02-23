<?php namespace Weboap\Winput;

use Illuminate\Support\ServiceProvider;

class WinputServiceProvider extends ServiceProvider {


	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;


	
	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('weboap/winput');
		
	}
	
	
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */	
	
	public function register()
	{
		
		$this->registerWinput();
		
		$this->RegisterBooting();
	}
	
		
	
	
	
	public function RegisterWinput()
	{
	    $this->app['winput'] = $this->app->share(function($app)
	    {
		return new Winput(
				  array(
					$app->make('Weboap\Winput\Services\HtmlPurifierService'),
					$app->make('Weboap\Winput\Services\SecurityService'),
					$app->make('Weboap\Winput\Services\TrimService')
					)
				  );
	    });
	}
	
	
	
	public function RegisterBooting()
	{
		
		 $this->app->booting(function()
				{
				   $loader = \Illuminate\Foundation\AliasLoader::getInstance();  
				   $loader->alias('Winput', 'Weboap\Winput\Facades\Winput');
				  
				});
		
		
	}
	


	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('winput' );
	}

}