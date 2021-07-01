<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();
        return view('blog.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post -> user_id = Auth::id();
        $post -> title = $request->input('title');
        $post -> description = $request->input('description');

        if ($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' .$extention;
            $file->move('uploads/blog/',$fileName);
            $post->image = $fileName;
        }

        $post -> status = $request->input('status') == true ? '1' : '0';
        $post->save();
        return redirect()->back()->with('status', 'Post Added Successfully');
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
        $post = Post::find($id);
        return view('blog.edit',compact('post'));
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
        $post = Post::find($id);

        $post -> user_id = Auth::id();
        $post -> title = $request->input('title');
        $post -> description = $request->input('description');
        if ($request->hasFile('image'))
        {
            $destination_path = 'uploads/blog/'.$post->image;
            if (File::exists($destination_path))
            {
                File::delete($destination_path);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '.' .$extention;
            $file->move('uploads/blog/',$fileName);
            $post->image = $fileName;
        }
        $post -> status = $request->input('status') == true ? '1' : '0';
        $post->update();

        return redirect()->back()->with('status', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $destination_path = 'uploads/blog/'.$post->image;
        if (File::exists($destination_path))
        {
            File::delete($destination_path);
        }
        $post-> delete();
        return redirect()->back()->with('status', 'Post Deleted Successfully');
    }
}
