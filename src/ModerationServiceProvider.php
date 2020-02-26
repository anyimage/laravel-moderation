<?php

namespace AnyImage\Moderation;

use AnyImage\Moderation\Nova\Field;
use AnyImage\Moderation\Nova\Rule;
use AnyImage\Moderation\Nova\Severity;
use AnyImage\Moderation\Nova\Violation;
use AnyImage\Moderation\Nova\WhitelistEntry;
use AnyImage\Moderation\Nova\WhitelistRequest;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;

class ModerationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('moderation.php'),
            ], 'config');

            $this->loadMigrationsFrom([
                __DIR__ . '/../database/migrations',
            ]);

        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind('moderation', ModerationClass::class);
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'moderation');

        \Nova::serving(function (ServingNova $event)
        {
            \Nova::resources([
                Field::class,
                Rule::class,
                Severity::class,
                Violation::class,
                WhitelistEntry::class,
                WhitelistRequest::class,
            ]);


        });

    }
}
