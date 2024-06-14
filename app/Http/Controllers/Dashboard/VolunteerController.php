<?php

namespace App\Http\Controllers\Dashboard;

use App\Constants\VolunteerStatus;
use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Mail\VolunteerMail;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VolunteerController extends Controller
{
    public function index(Request $request)
    {
//        dd('hit');
//        $this->authorize('view', Volunteer::class);
        if ($request->ajax()) {
            $columns = array(
                0 => 'name',
                1 => 'email',
                2 => 'phone_number',
                3 => 'status',
                4 => 'created_at',
                5 => 'action',
            );
            //            $meta = $this->defaultTableInput($request->only(['length', 'start', 'order']));

            $limit = $request->input('length') ?? '-1';
            $start = $request->input('start') ?? 0;
            $order = $columns[$request->input('order.0.column')] ?? $columns[0];
            $dir = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            $query = \DB::table('volunteers as u')
                ->select(
                    'u.id',
                    'u.name',
                    'u.phone_number',
                    'u.email',
                    'u.status',
                    'u.created_at',
                );
            $query->where('u.name', 'like', $search . '%')
                ->orWhere('u.email', 'like', $search . '%')
                ->orWhere('u.phone_number', 'like', $search . '%')
                ->orWhere('u.status', 'like', $search . '%')
                ->orWhere('u.created_at', 'like', $search . '%');
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
                    $nestedData['status'] = $v->status;
                    $nestedData['phone_number'] = $v->phone_number;
                    $nestedData['name'] = $v->name;
                    if($nestedData['status'] == VolunteerStatus::REQUESTED){
                        $nestedData['status'] = AppHelper::info_pill($v->status);
                    }
                    if($nestedData['status'] == VolunteerStatus::REJECTED){
                        $nestedData['status'] = AppHelper::danger_pill($v->status);
                    }
                    if($nestedData['status'] == VolunteerStatus::APPROVED){
                        $nestedData['status'] = AppHelper::success_pill($v->status);
                    }
                    $nestedData['email'] = $v->email;
                    $nestedData['created_at'] = \Carbon\Carbon::parse($v->created_at)->format('Y-m-d');
                    $nestedData['action'] = \View::make('dashboard.volunteers._action')->with('r', $v)->render();
                    $data[] = $nestedData;

                }


            }
            return response()->json([
                "draw" => intval($request->input('draw')),
                "recordsTotal" => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data" => $data
            ], 200);
        }
        return view('dashboard.volunteers.index');
    }

    public function show(Volunteer $volunteer)
    {
        return view('dashboard.volunteers.show', compact('volunteer'));
    }

    public function verifyVolunteer($id)
    {
        $volunteer = Volunteer::where('id',$id)->first();
        $volunteer->status = VolunteerStatus::APPROVED;
        $volunteer->save();
        $mailData = $volunteer;
        Mail::to($volunteer->email)->send(new VolunteerMail($mailData));
        return redirect()->back()->with('alert.success', 'Email Successfully Sent !!');
    }
    public function rejectVolunteer($id)
    {
        $volunteer = Volunteer::where('id',$id)->first();
        $volunteer->status = VolunteerStatus::REJECTED;
        $volunteer->save();
        $mailData = $volunteer;
        Mail::to($volunteer->email)->send(new VolunteerMail($mailData));
        return redirect()->back()->with('alert.success', 'Email Successfully Sent !!');
    }
}

