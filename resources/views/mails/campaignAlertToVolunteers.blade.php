<x-mail::message>
    <h2>Hello {{$volunteer->name}},</h2>
    <p>This is an invitation for you to join in our new campaign. </p>
    <p>The campaign details are as below</p>
    <ul>
        <li>Campaign Title: {{$campaign->title}}</li>
        <li>Campaign Description: {{$campaign->description}}</li>
        <li>Campaign Start date: {{$campaign->start_date}}</li>
        <li>Campaign End date: {{$campaign->end_date}}</li>
    </ul>
    <br>

<x-mail::button :url="route('participant.volunteerStore',['volunteer_id' => $volunteer->id, 'campaign_id' => $campaign->id])">
 Join Now
</x-mail::button>

    Happy Volunteering!<br>Thanks,
{{ config('app.name') }}
</x-mail::message>
