<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $columns = array(
                0 => 'title',
                1 => 'description',
                2 => 'image',
                3 => 'created_at',
                4 => 'action',
            );

            //for data table
            $limit  = $request->input('length') ?? '-1';
            $start  = $request->input('start') ?? 0;
            $order  = $columns[$request->input('order.0.column')] ?? $columns[0];
            $dir    = $request->input('order.0.dir') ?? 'asc';
            $search = $request->input('search.value') ?? '';

            //main query
            $query = \DB::table('posts as p')
                ->select(
                    'p.id',
                    'p.title',
                    'p.description',
                    'p.image',
                    'p.created_at',
                );

            $query->where(function ($q) use ($search) {
                $q->where('p.title', 'like', $search . '%');
                    $q->where('p.description', 'like', $search . '%');
                $q->where('p.image', 'like', $search . '%')
                    ->orWhere('p.created_at', 'like', $search . '%');
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
                    $nestedData['image'] = "<img class='prev-image' src='" . asset("storage/uploads/posts/$v->image") . "'/>";
                    $nestedData['created_at'] = $v->created_at;


                    //                    $nestedData['created_at'] = \Carbon\Carbon::parse($v->created_at)->format('Y-m-d');
                    //                    $nestedData['action'] = \View::make('dashboard.posts._actions')->with('row', $v)->render();
                    $nestedData['action'] = \View::make('dashboard.posts._actions')->with('row', $v)->render();
                    // $nestedData['action'] = \View::make('dashboard.brands._actions')->with('row', $v)->render();

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
        return view('dashboard.posts.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();

        return view('dashboard.posts.create', compact('post',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $image =    $request->file('image');
        $imageName = AppHelper::renameImageFileUpload($image);
        $image->storeAs("public/uploads/posts", $imageName);
        $title = $request->input('title');
        Post::create([
            'title'      => $title,
            'description'       => $request->input('description'),
            'image'       => $imageName,

        ]);
        return redirect()->route('posts.index')->with('toast.success', 'Successfully Created!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return  view('dashboard.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request,Post $post)
    {
        $input = $request->only(['title', 'description',  'image']);
        if(isset($input['image'])){
            $image = $input['image'];
            @unlink(public_path('storage/uploads/posts/' . $post->image));
            $imageName = AppHelper::renameImageFileUpload($image);
            $image->storeAs("public/uploads/posts", $imageName);
            $input['image'] = $imageName;
        }
        $post->update($input);
        return redirect()->route('posts.index')->with('alert.success', 'Blogs Successfully Added !!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::findOrFail($id);
        $post->delete();
        return response()->json([
            'message' => 'Successfully Deleted'
        ]);
    }
}
