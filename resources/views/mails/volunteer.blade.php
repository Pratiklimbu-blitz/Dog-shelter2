@component('mail::message')
    <h2>Hello {{$volunteer_mail_data->name}},</h2>
    <p>You have been {{$volunteer_mail_data->status}} for the Hamro shelter volunteering application.
    </p>Happy Volunteering!<br>Thanks,
    <br>{{ config('app.name') }}<br>
@endcomponent
