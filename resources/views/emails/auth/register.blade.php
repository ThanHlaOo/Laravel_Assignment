@component('mail::message')
# Register Successfully 
<h1>{{ $user['name'] }}</h1>
@component('mail::button', ['url' => 'http://localhost:8000/'])
Weclome to Home Page
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent