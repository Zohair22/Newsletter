<?php

namespace App\Http\Controllers;

use App\Providers\MailchimpNewsletter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(MailchimpNewsletter $newsletters): Redirector|Application|RedirectResponse
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
