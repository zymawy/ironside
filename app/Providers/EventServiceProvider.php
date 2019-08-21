<?php

namespace App\Providers;

use App\Events\ActivityWasTriggered;
use App\Events\ContactUsFeedback;
use App\Events\UserRegistered;
use App\Listeners\EmailContactUsToAdmin;
use App\Listeners\EmailContactUsToClient;
use App\Listeners\SaveActivity;
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
        // auth
        UserRegistered::class => [],

        // log actions
        ActivityWasTriggered::class => [
            SaveActivity::class,
        ],
        ContactUsFeedback::class => [
            EmailContactUsToClient::class,
            EmailContactUsToAdmin::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
