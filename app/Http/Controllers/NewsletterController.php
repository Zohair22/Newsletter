<?php

namespace App\Http\Controllers;

use App\Providers\Newsletters;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

class NewsletterController extends Controller
{
    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(Newsletters $newsletters): Redirector|Application|RedirectResponse
    {
        request()->validate(['email'=> 'required|email']);

        try
        {
            $newsletters->subscribe(request('email'));
        }
        catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter List!'
            ]);
        }

        return redirect(route('posts'))->with('success', 'You are now signed up for our newsletter!');
    }
}
