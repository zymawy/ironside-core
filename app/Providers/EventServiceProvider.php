<?php

namespace Zymawy\Ironside\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // auth
        'Zymawy\Ironside\Events\UserRegistered' => [],

        // log actions
        'Zymawy\Ironside\Events\ActivityWasTriggered' => [
            'Zymawy\Ironside\Listeners\SaveActivity',
        ],
        'Zymawy\Ironside\Events\ContactUsFeedback' => [
            'Zymawy\Ironside\Listeners\EmailContactUsToClient',
            'Zymawy\Ironside\Listeners\EmailContactUsToAdmin',
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
