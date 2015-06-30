<?php namespace Eius\Notifications;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider {

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
    public function boot() {

        $this->handleConfigs();
        // $this->handleMigrations();
        $this->handleViews();
        // $this->handleTranslations();
        // $this->handleRoutes();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        // Bind any implementations.

        $this->app->bind(
            'Eius\Notifications\Store\SessionStore',
            'Eius\Notifications\Store\LaravelSessionStore'
        );
        $this->app->bindShared('notifications', function () {
            return $this->app->make('Eius\Notifications\Notification\Notification');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {

        return [];
    }

    private function handleConfigs() {

        $configPath = __DIR__ . '/../config/notifications.php';

        $this->publishes([$configPath => config_path('notifications.php')]);

        $this->mergeConfigFrom($configPath, 'notifications');
    }

    private function handleTranslations() {

        $this->loadTranslationsFrom('notifications', __DIR__.'/../lang');
    }

    private function handleViews() {

        $this->loadViewsFrom('notifications', __DIR__.'/../views');

        $this->publishes([__DIR__.'/../views' => base_path('resources/views/vendor/notifications')]);
    }

    private function handleMigrations() {

        $this->publishes([__DIR__ . '/../migrations' => base_path('database/migrations')]);
    }

    private function handleRoutes() {

        include __DIR__.'/../routes.php';
    }
}
