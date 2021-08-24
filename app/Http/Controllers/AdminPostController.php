<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use http\Env\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    
    //    public function __construct()
    //    {
    //        $this->middleware('admin');
    //    }
    
    public function index(): Factory|View|Application
    {
        return view('admin.posts.index',[
            'posts' => Post::latest()->paginate(15)
        ]);
    }
    
    public function create(): View|Factory|Application
    {
        return view('admin.posts.create',[
            'categories' => Category::all()
        ]);
    }
    
    public function store(): Redirector|Application|RedirectResponse
    {
        if (auth()->user()->can('admin')){
            Post::create(array_merge($this->validatePost(), [
                'published_at' => Carbon::now(),
                'published' => true,
                'thumbnail' => request('thumbnail')->store('thumbnails')
            ]));
            return redirect(route('adminPosts'))->with('success', 'Post Added');
        }
        Post::create(array_merge($this->validatePost(), [
            'published_at' => Carbon::now(),
            'thumbnail' => request('thumbnail')->store('thumbnails')
        ]));
        return redirect(route('posts'))->with('success', 'Post Added Successfully, wating for admin to approve.');
        
    }
    
    public function edit(Post $post): Factory|View|Application
    {
        return view('admin.posts.edit', [
            'categories' => Category::all(),
            'post' => $post
        ]);
    }
    
    public function update(Post $post): Redirector|Application|RedirectResponse
    {
        $attributes = $this->validatePost($post);
        
        if (isset($attributes['thumbnail']))
        {
            $attributes['thumbnail']= $attributes['thumbnail']->store('thumbnails');
        }
        
        $post->update($attributes);
        return redirect(route('post', $post->slug))->with('success', 'Post Updated');
    }
    
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect(route('adminPosts'))->with('success', 'Deleted Successfully');
    }
    
    /**
     * @param \App\Models\Post|null $post
     *
     * @return array
     */
    protected function validatePost(?Post $post = null): array
    {
        $post ??= new Post();
        return request()->validate([
            'title' => 'required|string|max:255',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post), 'alpha_dash'],
            'thumbnail' => $post->exists ? ['image '] : ['image', 'required'],
            'body' => 'required',
            'excerpt' => 'required|string',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'user_id' => ['required', Rule::exists('users', 'id')],
            'published_at' => '',
        ]);
    }
    
    public function publish(Post $post): RedirectResponse
    {
        $post->update([
            'published' => true
        ]);
        return back()->with('success', 'Published Successfully');
    }
    
    public function unPublish(Post $post): RedirectResponse
    {
        $post->update([
            'published' => false
        ]);
        return back()->with('success', 'Un Published Successfully');
    }
    
}
