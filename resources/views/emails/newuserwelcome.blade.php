@component('mail::message')
<h3>Welcome, {{ $data['first_name'] }}</h3>
<h2 style="color: #628DB6;">Thanks you for signing up!</h2>
<p>Please active your account :</p>
@component('mail::button', ['url' => 'http://hiep.local/register/activation/'.$data['link']])
Confirm
@endcomponent
Thanks,<br>
@endcomponent

{{-- Please active your account : {{ url('register/activation/'.)}} --}}
