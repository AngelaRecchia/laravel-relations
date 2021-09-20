<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'content' => 'required'
        ]);

        $data = $request->all();
        $newPost = new Post();

        $slug = Str::slug($data['title'],'-');
        $slugBase = $slug;
        $slugPresent = Post::where('slug', $slug)->first();

        $count = 1;
        while($slugPresent){
            $slug = $slugBase . '-' .$count;
            $slugPresent = Post::where('slug', $slug)->first();
            $count++;
        }

        $newPost->slug =  $slug;
        $newPost->fill($data);
        $newPost->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:100',
            'content' => 'required'
        ]);

        $data = $request->all();

        if($data['title'] != $post->title){

            $slug = Str::slug($data['title'],'-');
            $slugBase = $slug;
            $slugPresent = Post::where('slug', $slug)->first();

            $contatore = 1;
            while($slug_presente){
                $slug = $slug_base . '-' . $contatore;
                $slugPresent = Post::where('slug', $slug)->first();
                $contatore++;
            }
            $data['slug'] = $slug;
        } 

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('updated', 'Post successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('deleted', 'The post has been deleted');
    }
}
