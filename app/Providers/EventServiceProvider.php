<?php

namespace App\Providers;

use App\Events\CommentCreated;
use App\Events\ForgotPassword;
use App\Listeners\NewCommentEmailNotification;
use App\Listeners\SendForgoPassword;
use App\Models\Comment;
use App\Models\Version;
use App\Observers\CommentObserver;
use App\Observers\VersionObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        CommentCreated::class => [
            NewCommentEmailNotification::class
        ],
        ForgotPassword::class => [
            SendForgoPassword::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Comment::observe(new CommentObserver());
        Version::observe(VersionObserver::class);
    }
}
