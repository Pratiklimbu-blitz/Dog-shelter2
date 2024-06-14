<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class PetAdoptionRequestEventNotification extends Notification {

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(protected $user, protected $dog)
    {
        //
    }


    public function via($notifiable)
    {
        return ['database'];
    }

    public function toMail($notifiable) {}

    public function toArray($notifiable)
    {
        return [
            'message'   => "Adoption request for " . $this->dog->name . $this->user->name,
            'dog_name'  => $this->dog->name,
            'dog_url'    => route('dogs.show', $this->dog->id),
            'user_url'   => route('users.show', $this->user->id),

        ];
    }
}
