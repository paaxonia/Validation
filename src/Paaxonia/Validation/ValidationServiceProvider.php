<?php  namespace Paaxonia\Validation;

use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider with laravel.
     */
    public function register()
    {
        $this->app->bind(
            'Paaxonia\Validation\FactoryInterface',
            'Paaxonia\Validation\LaravelValidator'
        );
    }
} 