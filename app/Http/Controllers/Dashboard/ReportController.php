<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use App\Models\Report;


class ReportController extends Controller
{
    public function index(Request $request){
        //        $this->authorize('view', Report::class);
        if ($request->ajax()) {
            $columns = array(
                0 => 'subject',
                1 => 'message ',
                2 => 'sender_name',
                3 => 'sender_email',
                4 => 'sender_phone',
                5 => 'location',
                6 => 'created_at',
                7 => 'action',

            );

            //            $meta = $this->defaultTableInput($request->only(['length', 'start', 'order']));

            $limit  = $request->input('length') ?? '-1';
            $start  = $request->input('start') ?? 0;
            $order  = $columns[$request->input('order.0.column')] ?? $columns[0];
            $dir    = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            $query = \DB::table('reports as r')

                ->select(
                    'r.id',
                    'r.subject',
                    'r.message',
                    'r.sender_name',
                    'r.sender_email',
                    'r.sender_phone',
                    'r.location',
                    'r.created_at',

                );
            $query->where('r.subject', 'like', $search . '%')
                ->orWhere('r.message', 'like', $search . '%')

                ->orWhere('r.sender_name', 'like', $search . '%')
            ->orWhere('r.sender_email', 'like', $search . '%')
                ->orWhere('r.sender_phone', 'like', $search . '%')
            ->orWhere('r.location', 'like', $search . '%');
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
                    $nestedData['subject'] = $v->subject;
                    $nestedData['message'] = $v->message;
                    $nestedData['sender_name'] = $v->sender_name;
                    $nestedData['sender_email'] = $v->sender_email;
                    $nestedData['sender_phone'] = $v->sender_phone;
                    $nestedData['location'] = $v->location;
                    $nestedData['created_at'] = \Carbon\Carbon::parse($v->created_at)->format('Y-m-d');
                    $nestedData['action'] = \View::make('dashboard.reports._actions')->with('r',$v)->render();
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
        return view('dashboard.reports.index');
    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {

        //        $this->authorize('create', Role::class);
        $report = new Report();

        return view('dashboard.reports.create', compact('report'));
    }

    /**
     * Store a newly created resource in storage.
     * @param ReportRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(ReportRequest $request)
    {

        //        $this->authorize('create', Report::class);
        $report = Report::create([
            'subject'              => $request->input('subject'),
            'message'             => $request->input('message'),
            'sender_name'           => $request->input('sender_name'),
            'sender_email'           => $request->input('sender_email'),
            'sender_phone'           => $request->input('sender_phone'),
            'location'           => $request->input('location'),




        ]);
        return redirect()->route('reports.show', compact('report'))->with('alert.success', 'Report Successfully Created !!');
    }

    /**
     * Display the specified resource.
     * @param Report $report
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Report $report)
    {

        //        $this->authorize('view', Report::class);
        return view('dashboard.reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Report $report
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Report $report)
    {

        //        $this->authorize('update', Report::class);
        return view('dashboard.reports.update', compact( 'report'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(ReportRequest $request, $id)
    {
        //        $this->authorize('update', Report::class);
        $report= Report::findorFail($id);
        Report::where('id', $id)->update([
            'subject'              => $request->input('subject'),
            'message'             => $request->input('message'),
            'sender_name'           => $request->input('sender_name'),
            'sender_email'           => $request->input('sender_email'),
            'sender_phone'           => $request->input('sender_phone'),
            'location'           => $request->input('location'),

        ]);
        return redirect()->route('reports.index', compact('report'))->with('alert.success', 'Report Successfully Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        //        $this->authorize('destroy', Report::class);
        Report::where('id', $id)->delete();
        return response()->json([
            'message' => 'Report Successfully Deleted',
        ], 200);
    }
}
