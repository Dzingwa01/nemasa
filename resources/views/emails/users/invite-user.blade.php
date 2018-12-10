@component('mail::message')
<h1>Invitation to join Dialect</h1>
<p> Dear {{$user->name. ' ' . $user->surname}}</p><br/>
<p>You have been invited to join Dialect. Please activate your account by clicking the button below.
</p>

@component('mail::button', ['url' => $url])
Activate account
@endcomponent

Thanks,<br>
{{'The '. config('app.name').' Team' }}
@endcomponent
