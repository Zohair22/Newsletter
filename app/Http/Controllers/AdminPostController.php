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
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(): Factory|View|Application
    {
        return view('admin.posts.index',[
            'posts' => Post::latest()->paginate(50)
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

        $attributes = request()->validate([
            'title' => 'required|string|max:255',
            'slug' => ['required', Rule::unique('posts', 'slug'), 'alpha_dash'],
            'thumbnail' => ['image'],
            'body' => 'required',
            'excerpt' => 'required|string|max:255',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'user_id' => ['required', Rule::exists('users', 'id')],
        ]);

        if (isset($attributes['thumbnail']))
        {
            $attributes['thumbnail']= $attributes['thumbnail']->store('thumbnails');
        }

        $post = Post::create($attributes);
        return redirect(route('post', $post->slug))->with('success', 'Post Added');
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
        $attributes = request()->validate([
            'title' => 'required|string|max:255',
            'slug'=> ['required',Rule::unique('posts', 'slug')->ignore($post), 'alpha_dash' ],
            'thumbnail' => ['image'],
            'body' => 'required',
            'excerpt' => 'required|string|max:255',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'user_id' => ['required', Rule::exists('users', 'id')],
        ]);

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
}
