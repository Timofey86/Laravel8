<?php

namespace App\Providers;

use App\Faker\FakerImageProvider;
use App\View\Components\Test;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function (){
            $faker = Factory::create();
            $faker->addProvider(new FakerImageProvider($faker));
            return $faker;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component(Test::class,'testcomponent');
        //
    }
}
