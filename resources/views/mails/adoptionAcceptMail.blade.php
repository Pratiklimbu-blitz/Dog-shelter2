@component('mail::message')
    <h2>Hello {{$user->name}},</h2>
    <p>Your request for {{ucwords($dog->name)}} adoption has been accepted.</p>
    <br>Thanks,
    <br>{{ config('app.name') }}<br>
@endcomponent
