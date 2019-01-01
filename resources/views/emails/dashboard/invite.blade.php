@component('mail::message')
{{-- Greeting --}}
# {!! __('dashboard/mail.title_contact_us',['full_name' => $userInvite->email]) !!}
{{-- Intro Lines --}}
{!! __('dashboard/mail.you_invited',['app_name' => config('app.name') ]) !!}<br/>
{!! __('dashboard/mail.click_here',['link' => url('/auth/register/'.$userInvite->token) ]) !!}<br/><br/>
{{-- Action Button --}}
@component('mail::button', ['url' => url('/auth/register/'.$userInvite->token), 'color' => 'blue'])
{!! __('dashboard/mail.create_account') !!}
@endcomponent
{!! __('dashboard/mail.regards') !!}<br>{{ config('app.name') }}
{{-- Subcopy --}}
@component('mail::subcopy')
{!! __('dashboard/mail.invited_subcopy') !!} [{{ url('/auth/register/'.$userInvite->token) }}]({{ url('/auth/register/'.$userInvite->token) }})
@endcomponent
@endcomponent