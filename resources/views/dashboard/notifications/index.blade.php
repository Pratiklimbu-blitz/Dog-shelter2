@extends('layouts.dashboard')
@section('content')
    <div>
        @forelse($notifications as $notification)
            <div class="alert alert-success d-flex justify-content-between" role="alert">
                @if($notification->type == 'App\Notifications\PetAdoptionRequestEventNotification')
                <div>
                    {{ucwords($notification->data['message'])}}
                </div>
                <div>
                    <a href="{{$notification->data['dog_url']}}" class="btn btn-primary text-dark">View Dog details</a>
                    <a href="{{$notification->data['user_url']}}" class="btn btn-secondary text-dark">View User details</a>
                    <span class="btn btn-info mark-as-read" style="cursor: pointer;" data-id="{{$notification->id}}">Mark as read</span>
                </div>
                @elseif($notification->type == 'App\Notifications\VoluntteerRequestNotification')
                        <div>
                                {{ucwords($notification->data['message'])}}
                        </div>
                        <div>
                            <a href="{{$notification->data['volunteer_url']}}" class="btn btn-primary text-dark">View Volunteer Details</a>
                            <span class="btn btn-info mark-as-read" style="cursor: pointer;" data-id="{{$notification->id}}">Mark as read</span>
                        </div>
                    @endif
            </div>
        @empty
            <div class="alert alert-danger" role="alert">
                No New Notification
            </div>
        @endforelse
        @if($notifications->count() > 0)
            <div>
                <span class="text-primary" style="cursor: pointer;" id="mark-all">Mark all as read</span>
            </div>
        @endif
    </div>
@endsection
@push('scripts')
    <script>
        function sendMarkRequest(id=null){
            return $.ajax("{{route('notifications.mark')}}", {
                method:  "POST",
                data: {
                    "_token" : CSRF_TOKEN,
                    id,
                }
            });
        }
        $(document).ready(function (){
            let current_count =  parseInt($('#notification-count').text());
            $('.mark-as-read').on('click', function(){
                let request = sendMarkRequest($(this).data('id'));
                request.done(()=>{
                    let new_count = current_count - 1;
                    current_count = new_count;
                    $('#notification-count').text(new_count);
                    $(this).parents('div.alert').remove();
                });
            });

            $('#mark-all').on('click', function(){
                let request = sendMarkRequest();
                request.done(()=>{
                    $('#notification-count').text('0');
                    $('div.alert').remove();
                });
            });
        });
    </script>
@endpush
