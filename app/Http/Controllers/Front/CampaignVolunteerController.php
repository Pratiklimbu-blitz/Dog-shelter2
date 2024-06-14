<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class CampaignVolunteerController extends Controller
{
    public function storeVolunteers( $volunteer_id, $campaign_id){
        $campaign = Campaign::find($campaign_id);
        if (!$campaign) {
        return response()->json([
            'error' => 'Campaign not found'
        ], 404);
    }

    if (!$volunteer_id) {
        return redirect()->route('campaigns.detail', ['id' => $campaign->id])->with('alert.error','Oops!! Something went wrong');
    }

    try {
        $campaign->volunteers()->attach($volunteer_id);
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect()->route('campaigns.detail', ['id' => $campaign->id])->with('alert.error','Oops!! Something went wrong');

    }

    return redirect()->route('campaigns.detail', ['id' => $campaign->id])->with('alert.success','Success!! Your participation has been submitted');

    }
    public function storeUsers(Request $request, $id)
    {
        $campaign = Campaign::find($id);
        $userId = $request->user_id;

        if (!$campaign) {
            return response()->json([
                'error' => 'Campaign not found'
            ], 404);
        }

        if (!$userId) {
            return response()->json([
                'error' => 'Invalid user ID'
            ], 400);
        }

        try {
            $campaign->users()->attach($userId);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'error' => 'Failed to join campaign or already Joined',
                'message' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully joined campaign'
        ]);
    }

}
