<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create(): Factory|View|Application
    {
        return view('register.create');
    }




    public function store(): RedirectResponse
    {
         $attributes= request()->validate([
            'username' => ['string', 'required', 'max:255', 'min:5', Rule::unique('users','username')],
            'name' => ['string', 'required', 'max:255', 'min:5'],
            'email' => ['email', 'required', 'max:255', Rule::unique('users','email')],
            'password' => ['required', 'min:8'],
        ]);
        $user = User::create($attributes);
        Auth::login($user);
        return redirect(route('posts'))->with('success', 'Ur Account has been Created Successfully.');
    }

}

