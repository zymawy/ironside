<?php

namespace App\Listeners;

use App\Events\ContactUsFeedback;
use App\Notifications\ContactUsSubmitted;

class EmailContactUsToAdmin
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

        notify_admins(ContactUsSubmitted::class, $data);

        log_activity(
            trans('dashboard/listener.contact-us'),
            $data->fullname.trans('dashboard/listener.contact-us-submitted'),
            $data);
    }
}
