<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Carbon;

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
        return view('admin.posts.create',[
            'categories' => Category::all()
        ]);
    }
    
    public function store(): Redirector|Application|RedirectResponse
    {
        $post = Post::create(array_merge($this->validatePost(), [
            'published_at' => Carbon::now(),
            'thumbnail' => request('thumbnail')->store('thumbnails')
        ]));
        
        return redirect(route('post', $post->slug))->with('success', 'Post Added');
    }

}
