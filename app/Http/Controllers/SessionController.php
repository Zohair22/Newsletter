<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function destroy(): Redirector|Application|RedirectResponse
    {
        Auth::logout();
        return redirect(route('loginForm'))->with('success', 'Good bye!');
    }

    public function create(): Factory|View|Application
    {
        return view('sessions.create');
    }

    /**
     * @throws ValidationException
     */
    public function login(): Redirector|RedirectResponse|Application
    {
        $attributes = request()->validate([
            'email' => ['exists:users,email', 'required'],
            'password' => ['required'],
        ]);

        if (! auth()->attempt($attributes))
        {
            throw ValidationException::withMessages([
                'email'=> 'Your provided credentials can not be verified.'
            ]);
        }

        session()->regenerate();
        return redirect(route('posts'))->with('success', 'Welcome Back!');
    }

}
