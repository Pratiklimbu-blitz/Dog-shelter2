<?php

namespace App\Http\Controllers\Front;

use App\Constants\VolunteerStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\VoluntteerRequestNotification;
use Illuminate\Http\Request;
use App\Models\Volunteer;
use App\Http\Requests\VolunteerRequest;
use Illuminate\Support\Facades\Notification;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return view(' front.volunteers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VolunteerRequest $request)
    {
       $volunteer =  Volunteer::create([
            'name'              => $request->input('name'),
            'email'             => $request->input('email'),
            'description'           => $request->input('description'),
            'phone_number'       => $request->input('phone_number'),
             'status'       => VolunteerStatus::REQUESTED,
         ]);
         $admin = User::whereIn('role_id',[1,2])->get();
         Notification::send($admin, new VoluntteerRequestNotification($volunteer));
        return redirect()->route('front.index')->with('toast.success', 'Your request has been successfully submitted!! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
