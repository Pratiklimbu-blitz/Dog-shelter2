<?php

namespace App\Http\Controllers\Dashboard;


use App\Constants\VolunteerStatus;
use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CampaignRequest;
use App\Mail\campaignAlertToVolunteers;
use App\Models\Campaign;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
//            dd('hit');
            $columns = array(
                0 => 'title',
                1 => 'date ',
                2 => 'description',
                3 => 'start_date',
                4 => 'end_date',
                5 => 'collected_amount',
                6 => 'poster',
                7 => 'created_at'
            );

            //for data table
            $limit  = $request->input('length') ?? '-1';
            $start  = $request->input('start') ?? 0;
            $order  = $columns[$request->input('order.0.column')] ?? $columns[0];
            $dir    = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            //main query
            $query = \DB::table('campaigns as c')
                ->select(
                    'c.id',
                    'c.title',
                    'c.description',
                    'c.start_date',
                    'c.end_date',
                    'c.collected_amount',
                    'c.poster',
                    'c.created_at',
                );

            $query->where(function ($q) use ($search) {
                $q->where('c.title', 'like', $search . '%')
                    ->orWhere('c.description', 'like', $search . '%')
                    ->orWhere('c.start_date', 'like', $search . '%')
                    ->orWhere('c.end_date', 'like', $search . '%')
                    ->orWhere('c.collected_amount', 'like', $search . '%')
                    ->orWhere('c.poster', 'like', $search . '%')
                    ->orWhere('c.created_at', 'like', $search . '%');
            });

            $totalData = $query->count();
            $query->orderBy($order, $dir);
            if ($limit != '-1') {
                $query->offset($start)->limit($limit);
            }
            $records = $query->get();
            $totalFiltered = $totalData;
            $data = array();
            if (isset($records)) {
                foreach ($records as $k => $v) {
                    $nestedData['id'] = $v->id;
                    $nestedData['title'] = $v->title;
                    $nestedData['description'] = $v->description;
                    $nestedData['start_date'] = $v->start_date;
                    $nestedData['end_date'] = $v->end_date;
                    $nestedData['collected_amount'] = $v->collected_amount;
                    $nestedData['poster'] = "<img class='prev-image' src='" . asset("storage/uploads/campaigns/$v->poster") . "'/>";
//                    $nestedData['created_at']  = $v->created_at;
                    $nestedData['created_at'] = \Carbon\Carbon::parse($v->created_at)->format('d-m-Y');
                    //                    $nestedData['action'] = \View::make('dashboard.posts._actions')->with('row', $v)->render();
                    $nestedData['action'] = \View::make('dashboard.campaigns._action')->with('row', $v)->render();
                    // $nestedData['action'] = \View::make('dashboard.brands._actions')->with('row', $v)->render();

                    $data[] = $nestedData;
                }
            }
            return response()->json([
                "draw"            => intval($request->input('draw')),
                "recordsTotal"    => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data"            => $data,
            ], 200);
        }

        return view('dashboard.campaigns.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campaign = new Campaign();
        return view('dashboard.campaigns.create', compact( 'campaign'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $image =    $request->file('poster');
        $imageName = AppHelper::renameImageFileUpload($image);
        $image->storeAs("public/uploads/campaigns", $imageName);
        $start_date = \Carbon\Carbon::parse($request->input('start_date'))->format('Y-m-d');
        $end_date = \Carbon\Carbon::parse($request->input('end_date'))->format('Y-m-d');
      $campaign =   Campaign::create([
            'title'        => $request->input('title'),
            'description' => $request->input('description'),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'collected_amount'=>  $request->input('collected_amount'),
            'poster'       => $imageName,
        ]);

        $volunteers = Volunteer::where('status',VolunteerStatus::APPROVED)->get();
        foreach ($volunteers as $volunteer):
            $campaign_url = 'hamroshelter.test/campaign/volunteer-store/'.$volunteer->id;
        Mail::to($volunteer->email)->send(new campaignAlertToVolunteers($campaign, $campaign_url,$volunteer));
        endforeach;
        return redirect()->route('campaigns.index')->with('toast.success', 'Successfully Created!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campaign = Campaign::findOrFail($id)->load('users');
//        dd($campaign);
        return view('dashboard.campaigns.show', compact('campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);
        return  view('dashboard.campaigns.edit', compact( 'campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CampaignRequest $request,Campaign $campaign )
    {

        $input = $request->only(['title', 'description',  'poster']);
        if(isset($input['poster'])){
            $poster = $input['poster'];
            @unlink(public_path('storage/uploads/campaigns/' . $campaign->poster));
            $imageName = AppHelper::renameImageFileUpload($poster);
            $poster->storeAs("public/uploads/campaigns", $imageName);
            $input['poster'] = $imageName;
        }
        $campaign->update($input);
        return redirect()->route('campaigns.index')->with('alert.success', 'Campaigns Successfully Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();
        return response()->json([
            'message' => 'Successfully Deleted'
        ]);
    }

}
