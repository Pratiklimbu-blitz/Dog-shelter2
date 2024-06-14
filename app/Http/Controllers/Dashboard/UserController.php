<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request){
//        dd('hit');
//        $this->authorize('view', User::class);
        if ($request->ajax()) {
            $columns = array(
                0 => 'name',
                1 => 'email',
                2 => 'role',
                3 => 'created_at',
                4 => 'action',
            );
            //            $meta = $this->defaultTableInput($request->only(['length', 'start', 'order']));

            $limit  = $request->input('length') ?? '-1';
            $start  = $request->input('start') ?? 0;
            $order  = $columns[$request->input('order.0.column')] ?? $columns[0];
            $dir    = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            $query = \DB::table('users as u')
                ->join('roles as r', 'r.id', 'u.role_id')
                ->select(
                    'u.id',
                    'u.name',
                    'u.email',
                    'u.created_at',
                    'r.label as role'
                );
            $query->where('u.name', 'like', $search . '%')
                ->orWhere('u.email', 'like', $search . '%')
                ->orWhere('r.label', 'like', $search . '%')
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
                    $nestedData['name'] = $v->name;
                    $nestedData['email'] = $v->email;
                    $nestedData['role'] = $v->role;
                    $nestedData['created_at'] = \Carbon\Carbon::parse($v->created_at)->format('Y-m-d');
                    $nestedData['action'] = \View::make('dashboard.users._action')->with('r',$v)->render();
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
        return view('dashboard.users.index');
    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
//        $this->authorize('create', User::class);
        $user = new User();
        $roles = Role::pluck('label', 'id');
        return view('dashboard.users.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(UserRequest $request)
    {
//        dd($request->all());
//        $this->authorize('create', User::class);
        $user = User::create([
            'name'              => $request->input('name'),
            'email'             => $request->input('email'),
            'role_id'           => $request->input('role_id'),
            'password'          => Hash::make($request->input('password'))
        ]);
        return redirect()->route('users.show', compact('user'))->with('alert.success', 'User Successfully Created !!');
    }

    /**
     * Display the specified resource.
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(User $user)
    {
//        $this->authorize('view', User::class);
        return view('dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(User $user)
    {
//        $this->authorize('update', User::class);
        $roles = Role::pluck('label', 'id');
        return view('dashboard.users.update', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(UserRequest $request, $id)
    {
//        $this->authorize('update', User::class);
        $user= User::findorFail($id);
        User::where('id', $id)->update([
            'name'         => $request->input('name'),
            'email'             => $request->input('email'),
            'role_id'           => $request->input('role_id'),
            'password'          => Hash::make($request->input('password'))
        ]);
        return redirect()->route('users.index', compact('user'))->with('alert.success', 'User Successfully Updated !!');
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
//        $this->authorize('destroy', User::class);
        User::where('id', $id)->delete();
        return response()->json([
            'message' => 'User Successfully Deleted',
        ], 200);
    }
}
