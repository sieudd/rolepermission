<?php

namespace Sieudd\Rolepermission\Providers;

use Config;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class RolePermissionServiceProvider extends ServiceProvider
{
    public function boot(Filesystem $filesystem)
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'lang');
        $this->publishes([
            __DIR__ . '/../../database/migrations/create_update_table.php.stub' => $this->getMigrationFileName($filesystem),
        ], 'migrations');
        Config::set('repository.fractal.serializer', 'League\Fractal\Serializer\JsonApiSerializer');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Sieudd\Rolepermission\Repositories\Contracts\RoleRepository::class, \Sieudd\Rolepermission\Repositories\Eloquent\RoleRepositoryEloquent::class);
        $this->app->bind(\Sieudd\Rolepermission\Repositories\Contracts\CityRepository::class, \Sieudd\Rolepermission\Repositories\Eloquent\CityRepositoryEloquent::class);
        $this->app->bind(\Sieudd\Rolepermission\Repositories\Contracts\StoreRepository::class, \Sieudd\Rolepermission\Repositories\Eloquent\StoreRepositoryEloquent::class);
        $this->app->bind(\Sieudd\Rolepermission\Repositories\Contracts\PermissionRepository::class, \Sieudd\Rolepermission\Repositories\Eloquent\PermissionRepositoryEloquent::class);
        //:end-bindings:
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param Filesystem $filesystem
     * @return string
     */
    protected function getMigrationFileName(Filesystem $filesystem): string
    {
        $timestamp = date('Y_m_d_His');

        return Collection::make($this->app->databasePath() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem) {
                return $filesystem->glob($path . '*_create_update_table.php');
            })->push($this->app->databasePath() . "/migrations/{$timestamp}_create_update_table.php")
            ->first();
    }
}
