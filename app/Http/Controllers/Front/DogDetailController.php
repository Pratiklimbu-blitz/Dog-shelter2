<?php

namespace App\Http\Controllers\Front;

use App\Helpers\AppHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\DogRequest;
use App\Models\Category;
use App\Models\Dog;
use Illuminate\Http\Request;

class DogDetailController extends Controller
{
    public function index()
    {
        $categories = Category::pluck('type', 'id');
        $dog = new Dog();
        return view(' front.dogdetail.index',compact('categories','dog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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

        return redirect()->route('front.index')->with('alert.success', 'Dogs Details Successfully Added !!');
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
