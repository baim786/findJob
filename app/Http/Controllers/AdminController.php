<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.adminDashboard')->with('posts', $posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('admin.show')->with('post', $post);
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

        if (Auth::user()->email == "ibrahim@example.com") {
            return view('admin.edit')->with('post', $post);
        }
        if (!isset($post)) {
            return redirect('/posts')->with('error', 'No post Found');
        }
        return redirect('/posts')->with('error', 'No post Found');
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

        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'cover_image' => 'image|nullable|max:1999'

        ]);

        if ($request->hasFile('cover_image')) {
            ///Get file name with Extensiom
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();

            ///get just a filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            ///Save the image
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            //upload the image to file
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->desc = $request->input('desc');
        $post->phone = $request->input('phone');
        $post->email = $request->input('email');
        if ($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        return redirect('/admin/landingpage')->with('success', 'Post Edited');
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


        if (Auth::user()->email == 'ibrahim@example.com') {

            $post->delete();
            return redirect('/admin/landingpage')->with('success', 'Post Removed');
        }
        //Check if post exists before deleting
        if (!isset($post)) {
            return redirect('/admin/landingpage')->with('error', 'No Post Found');
        }


        if ($post->cover_image !== 'noimage.jpg') {

            Storage::delete('public/cover_images' . $post->cover_image);
        }
        return redirect('/admin/landingpage')->with('error', 'No post Found');
    }
}
