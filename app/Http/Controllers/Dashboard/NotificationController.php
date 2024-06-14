<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Notifications\PetAdoptionRequestEventNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $notifications = $user->unreadNotifications()->get();
//        $dogNotifications = $user->Notifications()->where('type', PetAdoptionRequestEventNotification::class)->get();
        return view('dashboard.notifications.index', compact('notifications'));
    }

    public function markNotifications(Request $request): \Illuminate\Http\Response
    {
        \auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request){
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();
        return response()->noContent();
    }
}
