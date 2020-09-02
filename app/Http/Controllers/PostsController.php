<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Tag;
use App\Category;
use App\Post;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        return view('posts.index', [
            'posts' => $posts,
            'recentPosts' => Post::latest()->get(),
            'categories' => Category::get(),
            'tags' => Tag::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create',[
            'categories' => Category::get(),
            'tags' => Tag::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $slug = Str::slug(request('title'));

        if (request()->file('thumbnail')) {
            $thumbnail = request()->file('thumbnail');
            $thumbnailUrl = $thumbnail->storeAs("images/posts", time().".{$thumbnail->extension()}");
        } else{
            $thumbnailUrl = null;
        }
        
        $post = auth()->user()->posts()->create([
            'title' => request('title'),
            'body' => request('body'),
            'slug' => $slug,
            'category_id' => request('category'),
            'thumbnail' => $thumbnailUrl,
        ]);
        $post->tags()->attach(request('tag'));

        return redirect('/posts')->with('success','Post Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'recentPosts' => Post::latest()->get(),
            'categories' => Category::get(),
            'tags' => Tag::get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $request->validate([
            'thumbnail' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $this->authorize('update', $post);

        $slug = Str::slug(request('title'));

        if (request()->file('thumbnail')) {
            \Storage::delete($post->thumbnail);
            $thumbnail = request()->file('thumbnail');
            $thumbnailUrl = $thumbnail->storeAs("images/posts", time().".{$thumbnail->extension()}");
        } else{
            $thumbnailUrl = $post->thumbnail;
        }
        
        $post->update([
            'title' => request('title'),
            'body' => request('body'),
            'slug' => $slug,
            'category_id' => request('category'),
            'thumbnail' => $thumbnailUrl,
        ]);
        $post->tags()->sync(request('tag'));

        return redirect("/posts/$post->slug")->with('success','Post Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        \Storage::delete($post->thumbnail);
        $post->tags()->detach();
        $post->delete();

        return redirect('/posts')->with('success','Post Deleted Successfully!');
    }
}