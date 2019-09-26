@component('mail::message')
<h3>Welcome, {{ $data['name'] }}</h3>
Please click button password retrieval
@component('mail::button',  ['url' => 'http://hiep.local/form-new-password/'.$data['link']])
Reset new password
@endcomponent
Thanks,<br>
@endcomponent
