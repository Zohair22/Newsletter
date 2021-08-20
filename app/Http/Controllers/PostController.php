<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(): Factory|View|Application
    {
        return view('posts.index',[
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(9)->withQueryString(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show(Post $post): View|Factory|Application
    {
        return view('posts.show',compact('post'));
    }


    public function create(): View|Factory|Application
    {
        return view('posts.create',[
            'categories' => Category::all()
        ]);
    }


    public function store(): Redirector|Application|RedirectResponse
    {
        $attributes = request()->validate([
            'title' => 'required|string|max:255',
            'slug' => ['required' ,Rule::unique('posts', 'slug')],
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
        return redirect(route('post', $post->slug));
    }

}
