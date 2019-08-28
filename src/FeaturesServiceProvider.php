<?php

namespace AwesomeNova\Features;

use Laravel\Nova\Nova;
use Laravel\Nova\Fields;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use AwesomeNova\Features\Mixins\KeepOriginalNameMixin;

/**
 * Class FeaturesServiceProvider.
 */
class FeaturesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Event::listen(ServingNova::class, static function () {
            Nova::script('awesome-nova-features', dirname(__DIR__) . '/dist/js/features.js');
        });

        $keepOriginalNameMixin = new KeepOriginalNameMixin();

        Fields\File::mixin($keepOriginalNameMixin);
        Fields\Image::mixin($keepOriginalNameMixin);
        Fields\Avatar::mixin($keepOriginalNameMixin);
    }
}
