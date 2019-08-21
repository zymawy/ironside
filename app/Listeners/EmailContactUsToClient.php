<?php

namespace App\Listeners;

use App\Events\ContactUsFeedback;
use App\Mail\ClientContactUs;

class EmailContactUsToClient
{
    /**
     * Handle the event.
     *
     * @param ContactUsFeedback $event
     *
     * @return void
     */
    public function handle(ContactUsFeedback $event)
    {
        $data = $event->eloquent;

        \Mail::send(new ClientContactUs($data));
    }
}
