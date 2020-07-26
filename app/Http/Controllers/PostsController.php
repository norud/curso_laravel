<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostsRequest;
use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    public function contact()
    {
        $people = ['Yeral', 'Edwin', 'Gey', 'Ub'];
        return view(
            'contact',
            compact(
                'people'
            )
        );
    }
    public function show_posts($id, $name, $tk)
    {
        //return view('post')->with('id', $id);
        return view('post', compact('id', 'name', 'tk'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $r)
    {
        /*  Post::create([
            'title' => $r->title
      ]);*/
        //validate
        /* $this->validate($r, [
          'title' => 'required|min:3',
          'content' => 'required'
      ]);*/

        $post = new Post;
        $post->title = $r->title;
        $post->content = $r->content;
        $post->save();
        return redirect()->route('posts.index');
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
        //
        return view('posts.show', compact('post'));
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
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $r->title;
        $post->content = $r->content;
        $post->update();
        return redirect()->route('posts.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect('posts');
    }
}
