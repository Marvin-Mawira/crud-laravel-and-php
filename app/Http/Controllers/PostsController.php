<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Spatie\Html\Elements\Form;
use \Illuminate\Foundation\Validation\ValidatesRequests;



class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // $posts = Post::all();

        // $posts = Post::orderBy('title','desc')->get();


        //pagination
        $posts = Post::orderBy('created_at','desc')->paginate(10);

        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'title' => 'required',
        //     'body' => 'required',
        // ]);
        // return 123;
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
            'cover_image' => 'image|nullable|max:1999', 

        ]);

        if ($request->hasFile('cover_image')) {
            // Get the original file name with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just the file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Create a unique file name to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Store the image in the 'public/images' directory
            $path = $request->file('cover_image')->storeAs('public/images', $fileNameToStore);
        } else {
            $fileNameToStore = null;
        }

        ///create new posts
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('message');
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        ///create new posts
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('message');
        $post->save();

        // return ('hello');

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the post by its ID
        $post = Post::find($id);

        // Check if the post exists
        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Post not found');
        }

        // Delete the post
        $post->delete();

        // Redirect to the posts index with a success message
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }

}
