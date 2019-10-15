<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'title'     =>  "This is posts page",
            'posts'     =>  Post::orderBy('updated_at', 'DESC')->get()
        );

        return view('posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array(
            'title'     => 'Add Post',
        );
        return view('posts.add_post')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $validatedData = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required|min:12',
            'post_image' => 'image|nullable|max:2050',
        ]);

        if ($request->hasFile('post_image')){
            $fileNameWithExt = $request->file('post_image')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('post_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
            $path = $request->file('post_image')->storeAs('public/post_images', $fileNameToStore);

        }else{
            $fileNameToStore = 'default-image.jpg';
        }

        $post = new Post;

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->post_image = $fileNameToStore;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('posts')->with('success', 'Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'title'     =>  Post::find($id)->value('title'),
            'post'      =>  Post::find($id),
            'comments'  =>  Post::find($id)->comments
        );

        return view('posts.post_view')->with($data);
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

        $data = array(
            'title'     => Post::find($id)->value('title'),
            'post'      => Post::find($id)
        );

        if (Auth()->User()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Sorry! You are not authorized to edit this post');
        }

        return view('posts.edit_post')->with($data);
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
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|min:12',
            'post_image' => 'image|nullable|max:2050'
        ]);
        if ($request->hasFile('post_image')){
            $fileNameWithExt = $request->file('post_image')->getClientOriginalName();
            $fileName       = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $fileExt        = $request->file('post_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
            $path = $request->file('post_image')->storeAs('public/post_images', $fileNameToStore);

        }else{
            $fileNameToStore = 'default-image.jpg';
        }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if ($request->hasFile('post_image')){
            $post->post_image  = $fileNameToStore;
        }
        $post->save();

        return redirect('posts')->with('success', 'post Updated Successfully');
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

        if (Auth()->User()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Sorry! You are not authorized to edit this post');
        }
        if($post->post_image !== 'default-image.jpg'){
            Storage::delete("public/post_images/{$post->post_image}");
        }

        $post->delete();

        return redirect('/posts')->with('success', 'post Deleted Successfully');
    }
}
