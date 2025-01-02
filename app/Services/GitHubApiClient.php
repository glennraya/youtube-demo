<?php

namespace App\Services;

use App\Contracts\ApiClientInterface;
use Illuminate\Support\Facades\Http;

class GitHubApiClient implements ApiClientInterface
{
    public function fetchData(string $resource)
    {
        // Fetch data from the GitHub API...
        $user = Http::get('https://jsonfakery.com/users/random');

        $data = $user->json();

        return $data['email'];
    }
}
