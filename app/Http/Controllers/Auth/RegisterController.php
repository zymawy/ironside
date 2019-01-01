<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use App\Models\UserInvite;
use Illuminate\Http\Request;
use App\Events\UserRegistered;
use App\Notifications\UserConfirmedAccount;

class RegisterController extends AuthController
{
    /**
     * Show the application registration form.
     *
     * @param $token
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm($token = null)
    {
        $this->showPageBanner = false;
    

        // check if token is valid
        $userInvite = UserInvite::whereToken($token)->whereNull('claimed_at')->first();

        return $this->view('register')->with('userInvite', $userInvite);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $attributes = request()->validate(User::$rules);

        // create new user
        $user = User::create([
            'firstname'          => $attributes['firstname'],
            'lastname'           => $attributes['lastname'],
            'email'              => $attributes['email'],
            'password'           => bcrypt($attributes['password']),
            'confirmation_token' => 'confirmation_token', // will generate a new unique token
        ]);

        // add user roles
        // send email
        // log activity
        event(new UserRegistered($user, input('token')));

        alert()->success(__('dashboard/mail.thank_you'),
            __('dashboard/mail.msg_to_check_your_mail'));

        log_activity(__('auth.register.title.page'), $user->fullname . __('dashboard/mail.registered'));

        return redirect(route('login'));
    }

    /**
     * User click on register confirmation link in mail
     *
     * @param $token
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function confirmAccount($token)
    {
        $user = User::where('confirmation_token', $token)->first();
        if ($user) {
            if ($user->confirmed_at && strlen($user->confirmed_at) > 6) {
                alert()->info(__('dashboard/mail.active_account'),
                    __('dashboard/mail.msg_already_active'));
            }
            else {
                // confirm / activate user
                $user->confirmation_token = null;
                $user->confirmed_at = Carbon::now();
                $user->update();

                // notify
                $user->notify(new UserConfirmedAccount());

                alert()->success(__('dashboard/mail.success'),
                    __('dashboard/mail.congratulations'));

                log_activity(__('dashboard/indexes.user_confirmed'), $user->fullname . __('dashboard/indexes.confirmed_their'), $user);
            }
        }
        else {
            alert()->error(__('dashboard/general.whoops'), __('dashboard/general.sorry_token_not_exist'));

            log_activity(__('dashboard/indexes.user_confirmed'), __('dashboard/general.invalid_token'));
        }

        return redirect(route('login'));
    }
}
