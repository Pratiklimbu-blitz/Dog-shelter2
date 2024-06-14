@component('mail::message')
    <h2>Hello {{$user->name}},</h2>
    <p>Your request for {{ucwords($dog->name)}} adoption has been rejected.</p>
    <br>Thanks,
    <br>{{ config('app.name') }}<br>
@endcomponent
