@component('mail::message')
    # {!! __('dashboard/mail.title_contact_us',['full_name' => $contactUs->fullname]) !!}
    <br/>
    {!! __('dashboard/mail.thank_you') !!}<br/>

    {!! __('dashboard/mail.appreciate_it') !!}<br/>

    {!! __('dashboard/mail.regards') !!}<br>{{ config('app.name') }}
@endcomponent