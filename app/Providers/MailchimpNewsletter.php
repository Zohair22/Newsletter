<?php

namespace App\Providers;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $client)
    {
    }

    public function subscribe(string $email ,string $list=Null): mixed
    {
        $list ??= config('services.mailchimp.lists.Subscribers');

        return $this->client ->lists->addListMember($list,[
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }

}
