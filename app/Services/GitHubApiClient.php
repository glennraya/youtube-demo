<?php

namespace App\Services;

use App\Contracts\ApiClientInterface;
use Illuminate\Support\Facades\Http;

class GitHubApiClient implements ApiClientInterface
{
    public function fetchData()
    {
        // Fetch data from Twitter API
        $data = Http::get('https://jsonfakery.com/users/random');

        $user = $data->json();

        return [
            'email' => $user['email'],
            'name' => $user['first_name'] . ' ' . $user['last_name'],
            'role' => $user['role'],
        ];
    }
}
