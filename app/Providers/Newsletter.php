<?php

namespace App\Providers;

interface Newsletter
{
    public function subscribe(string $email, string $list = Null);
}
