<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //relationships like posts() give us all model method has
        //but if we want to show a collection we remove () and just use posts
        $post = auth()->user()->posts()->paginate(5);
        return view('admin.posts.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $this->authorize('create', Post::class);
        $inputs = $r->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);
        if(request('post_image')){
            $inputs['post_image'] = $r->post_image->store('images');
        }
        auth()->user()->posts()->create($inputs);
        $r->session()->flash('success', 'Post  was creted');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('blog-post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //option 1 to use policy in controller
        $this->authorize('view', $post);
        //option 2 to use policy in controller
        /**
         * if(auth()->user()->can('view', $post)){
         *
         * }
         */
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Post $post)
    {
        $inputs = $r->validate([
            'title' => 'required|min:8|max:255',
            'body' => 'required'
        ]);
        if(request('post_image')){
            $inputs['post_image'] = $r->post_image->store('images');
            $post->post_image = $inputs['post_image'];
        }
        $post->title = $r->title;
        $post->body = $r->body;

        //check if i can update
        $this->authorize('update', $post);

        $post->save();
        $r->session()->flash('success', 'The Post  has been updated');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, Request $r)
    {
        $this->authorize('delete', $post);
         $post->delete();
         $r->session()->flash('message', 'Post #'.$post->id.' was delete');
         return back();
    }
}
