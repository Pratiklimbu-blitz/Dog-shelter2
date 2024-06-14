<?php

namespace App\Http\Controllers\Front;

use App\Constants\DogStatus;
use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\User;
use App\Notifications\PetAdoptionRequestEventNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdoptionController extends Controller
{
    public function adoption(Dog $dog) {
        if($dog->status !== DogStatus::AVAILABLE){
            return response()->json(['message' => 'Couldn\'t adopt selected dog'], 403);
        }
        $user = Auth::user();
        $dog->user_id = $user->id;
        $dog->status = DogStatus::REQUESTED;
        $dog->save();

        //TODO: Replace static admin id
        $adminUsers = User::whereIn('role_id', [1,2])->get();

        Notification::send($adminUsers, new PetAdoptionRequestEventNotification($user, $dog));
        return  response()->json(['message' => 'Successfully Requested For Adoption !!']);
    }
}
