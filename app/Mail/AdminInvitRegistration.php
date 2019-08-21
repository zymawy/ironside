<?php

namespace App\Mail;

use App\Models\UserInvite;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminInvitRegistration extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var UserInvite
     */
    public $userInvite;

    /**
     * Create a new message instance.
     *
     * @param UserInvite $userInvite
     */
    public function __construct(UserInvite $userInvite)
    {
        $this->userInvite = $userInvite;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->userInvite->email)
            ->subject(__('dashboard/mail.mail_admin_title').config('app.name'))
            ->markdown('emails.dashboard.invite');
    }
}
