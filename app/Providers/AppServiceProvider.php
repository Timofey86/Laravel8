<?php

namespace App\Providers;

use App\Faker\FakerImageProvider;
use App\Notifications\TelegramNotificator;
use App\Services\TestService;
use App\Utilities\MessengerNotificationInterface;
use App\View\Components\Test;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Http\Resources\Json\JsonResource;
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
        $this->app->bind(TestService::class, function (){
            return new TestService(true);
        });
        $this->app->bind(MessengerNotificationInterface::class,TelegramNotificator::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('helloWorld', function ($name){
            return 'Hello Workd!!!!!! ' . $name;
        });

        Blade::if('mailmailer', function ($val){
            return env('MAIL_MAILER') === $val;
        });
        Blade::component(Test::class,'testcomponent');
//        \Illuminate\Support\Facades\View::share('version', 2);
//        JsonResource::withoutWrapping(); //еслу не нужна обертка для ответа по апи
//        JsonResource::wrap('chepukabra'); // global wrap name
    }
}
