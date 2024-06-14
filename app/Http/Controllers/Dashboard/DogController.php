<?php

namespace App\Http\Controllers\Dashboard;

use App\Constants\DogStatus;
use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\DogRequest;
use App\Mail\AdoptionAcceptMail;
use App\Mail\AdoptionRejectMail;
use App\Mail\VolunteerMail;
use App\Models\Category;
use App\Models\Dog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DogController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        //$this->authorize('view', Dog::class);
        if ($request->ajax())
        {
            $columns = array(
                0 => 'name',
                1 => 'image',
                2 => 'category',
                3 => 'status',
                4 => 'created_at',
                5 => 'action',
            );

            $limit = $request->input('length') ?? '-1';
            $start = $request->input('start') ?? 0;
            $order = $columns[$request->input('order.0.column')] ?? $columns[0];
            $dir = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            $query = \DB::table('dogs as d')
                ->join('categories as c', 'c.id', 'd.category_id')
                ->select(
                    'd.id',
                    'd.name',
                    'd.image',
                    'c.type as type',
                    'd.status',
                    'd.created_at',
                );
            $query->where('d.name', 'like', $search . '%')
                ->orWhere('type', 'like', $search . '%')
                ->orWhere('d.status', 'like', $search . '%')
                ->orWhere('d.created_at', 'like', $search . '%');
            $totalData = $query->count();
            $query->orderBy($order, $dir);
            if ($limit != '-1')
            {
                $query->offset($start)->limit($limit);
            }
            $records = $query->get();
            $totalFiltered = $totalData;
            $data = array();
            if (isset($records))
            {
                foreach ($records as $k => $v)
                {
                    $nestedData['id'] = $v->id;
                    $nestedData['name'] = $v->name;
                    $nestedData['image'] = "<img class='prev-image' src='" . asset("storage/uploads/dogs/$v->image") . "'/>";
                    $nestedData['type'] = $v->type;
                    $nestedData['status'] = $v->status;
                    $nestedData['created_at'] = \Carbon\Carbon::parse($v->created_at)->format('Y-m-d');
                    $nestedData['action'] = \View::make('dashboard.dogs._action')->with('r', $v)->render();
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

        return view('dashboard.dogs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::pluck('type', 'id');
        $dog = new Dog();

        return view('dashboard.dogs.create', compact('categories', 'dog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DogRequest $request)
    {
        $image =    $request->file('image');
        $imageName = AppHelper::renameImageFileUpload($image);
        $image->storeAs("public/uploads/dogs", $imageName);
        $user = Dog::create([
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category'),
            'status'      => $request->input('status'),
            'image'       => $imageName,
        ]);

        return redirect()->route('dogs.index')->with('alert.success', 'Dogs Successfully Added !!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Dog $dog)
    {
        $dog = $dog->load('user');
        return view('dashboard.dogs.show', compact('dog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Dog $dog)
    {
        $categories = Category::pluck('type', 'id');

        return view('dashboard.dogs.update', compact('categories', 'dog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DogRequest $request, Dog $dog)
    {
        $input = $request->only(['name', 'description', 'category', 'status', 'image']);
        if(isset($input['image'])){
            $image = $input['image'];
            @unlink(public_path('storage/uploads/dogs/' . $dog->image));
            $imageName = AppHelper::renameImageFileUpload($image);
            $image->storeAs("public/uploads/dogs", $imageName);
            $input['image'] = $imageName;
        }
        $dog->update($input);
        return redirect()->route('dogs.index')->with('alert.success', 'Dogs Successfully Added !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Dog $dog)
    {
        @unlink(public_path('storage/uploads/dogs/' . $dog->image));
        $dog->delete();
        return response()->json(['message' => 'Dog successfully removed']);
    }

    public function toggleStatus(Dog $dog, Request $request){
        $request->validate([
            'status' => ['required', 'string', 'in:'.implode(',', array_keys(DogStatus::LIST))]
        ]);

        $dog->status = $request->input('status');
        $user = User::where('id', $dog->user_id)->first();
        if($dog->status === DogStatus::AVAILABLE){
            $dog->user_id = null;
        }
        $dog->save();

        if($dog->status === DogStatus::AVAILABLE){
            Mail::to($user)->send(new AdoptionRejectMail($dog, $user));
        }else{
            Mail::to($user)->send(new AdoptionAcceptMail($dog, $user));
        }
        return response()->json(['messsage' => 'status updated!!']);
    }
}
