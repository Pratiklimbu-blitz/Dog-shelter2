<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;
use App\Models\Role;

use Illuminate\Support\Facades\Hash;

class RoleController extends Controller
{
    //
    public function index(Request $request){
        //        $this->authorize('view', Role::class);
                if ($request->ajax()) {
                    $columns = array(
                        0 => 'name',
                        1 => 'label',
                        2 => 'description',
                        3 => 'created_at',
                        4 => 'action',

                    );
                    //            $meta = $this->defaultTableInput($request->only(['length', 'start', 'order']));

                    $limit  = $request->input('length') ?? '-1';
                    $start  = $request->input('start') ?? 0;
                    $order  = $columns[$request->input('order.0.column')] ?? $columns[0];
                    $dir    = $request->input('order.0.dir') ?? 'asc';
                    $search = $request->input('search.value') ?? '';

                    $query = \DB::table('roles as r')
                        // ->join('roles as r', 'r.id')
                        ->select(
                            'r.id',
                            'r.name',
                            'r.label',
                            'r.description',
                            'r.created_at',

                        );
                    $query->where('r.name', 'like', $search . '%')
                        ->orWhere('r.label', 'like', $search . '%')

                        ->orWhere('r.description', 'like', $search . '%');
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
                            $nestedData['name'] = $v->name;
                            $nestedData['label'] = $v->label;
                            $nestedData['description'] = $v->description;
                            $nestedData['created_at'] = \Carbon\Carbon::parse($v->created_at)->format('Y-m-d');
                            $nestedData['action'] = \View::make('dashboard.roles._action')->with('r',$v)->render();
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
                return view('dashboard.roles.index');
            }
            /**
             * Show the form for creating a new resource.
             * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
             * @throws \Illuminate\Auth\Access\AuthorizationException
             */
            public function create()
            {
        //        $this->authorize('create', Role::class);
                $role = new Role();
                return view('dashboard.roles.create', compact('role'));
            }

            /**
             * Store a newly created resource in storage.
             * @param RoleRequest $request
             * @return \Illuminate\Http\RedirectResponse
             * @throws \Illuminate\Auth\Access\AuthorizationException
             */
            public function store(RoleRequest $request)
            {

        //        $this->authorize('create', User::class);
                $role = Role::create([
                    'name'              => $request->input('name'),
                    'label'             => $request->input('label'),
                    'description'           => $request->input('description'),

                ]);
                return redirect()->route('roles.show', compact('role'))->with('alert.success', 'Role Successfully Created !!');
            }

            /**
             * Display the specified resource.
             * @param Role $user
             * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
             * @throws \Illuminate\Auth\Access\AuthorizationException
             */
            public function show(Role $role)
            {

        //        $this->authorize('view', User::class);
                return view('dashboard.roles.show', compact('role'));
            }

            /**
             * Show the form for editing the specified resource.
             * @param Role $user
             * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
             * @throws \Illuminate\Auth\Access\AuthorizationException
             */
            public function edit(Role $role)
            {

        //        $this->authorize('update', User::class);
                $roles = Role::pluck('label', 'id');
                return view('dashboard.roles.update', compact( 'role'));
            }

            /**
             * Update the specified resource in storage.
             * @param Request $request
             * @param $id
             * @return \Illuminate\Http\RedirectResponse
             * @throws \Illuminate\Auth\Access\AuthorizationException
             */
            public function update(RoleRequest $request, $id)
            {
        //        $this->authorize('update', User::class);
                $role= Role::findorFail($id);
                Role::where('id', $id)->update([
                    'name'         => $request->input('name'),
                    'label'             => $request->input('label'),
                    'description'           => $request->input('description'),

                ]);
                return redirect()->route('roles.index', compact('role'))->with('alert.success', 'Role Successfully Updated !!');
            }

            /**
             * Remove the specified resource from storage.
             * @param $id
             * @return \Illuminate\Http\JsonResponse
             * @throws \Illuminate\Auth\Access\AuthorizationException
             */
            public function destroy($id): \Illuminate\Http\JsonResponse
            {
        //        $this->authorize('destroy', Role::class);
                Role::where('id', $id)->delete();
                return response()->json([
                    'message' => 'Role Successfully Deleted',
                ], 200);
            }

}
