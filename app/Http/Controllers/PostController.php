<?php
				
				namespace App\Http\Controllers;
				
				use App\Models\Post;
				use Illuminate\Contracts\Foundation\Application;
				use Illuminate\Contracts\View\Factory;
				use Illuminate\Contracts\View\View;
				
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
								
				}
