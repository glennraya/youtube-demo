<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Contracts\ApiClientInterface;

class TwitterApiClient implements ApiClientInterface
{
    public function fetchData(string $resource)
    {
        $data = Http::get('https://jsonfakery.com/users/random');

        $user = $data->json();

        return [
            'email' => $user['email'],
            'name' => $user['first_name'] . ' ' . $user['last_name'],
            'role' => $user['role'],
        ];
    }
}
