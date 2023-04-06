<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Model::unguard();
        Model::shouldBeStrict(! App::isProduction());

        if (App::isProduction()) {
            Model::handleLazyLoadingViolationUsing(function ($model, $relation) {
                $class = get_class($model);

                info("Attempted to lazy load [{$relation}] on model [{$class}].");
            });

            Model::handleMissingAttributeViolationUsing(function ($model, $key) {
                $class = get_class($model);

                info("Attempted to access [{$key}] on model [{$class}].");
            });
        }
    }
}
