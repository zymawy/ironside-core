<?php

namespace Zymawy\Ironside\Listeners;

use Zymawy\Ironside\Mail\ClientContactUs;
use Zymawy\Ironside\Events\ContactUsFeedback;

class EmailContactUsToClient
{
    /**
     * Handle the event.
     *
     * @param  ContactUsFeedback $event
     * @return void
     */
    public function handle(ContactUsFeedback $event)
    {
        $data = $event->eloquent;

        \Mail::send(new ClientContactUs($data));
    }
}
