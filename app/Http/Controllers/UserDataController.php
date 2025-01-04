<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

interface UserFetcherInterface
{
    public function fetch();
}

class TwitterApi implements UserFetcherInterface
{
    public function fetch()
    {
        $user = Http::get('https://jsonfakery.com/users/random');

        return [
            'email' => $user['email'],
            'name' => $user['first_name'] . ' ' . $user['last_name'],
            'role' => $user['role'],
        ];
    }
}

class GitHubApi implements UserFetcherInterface
{
    public function fetch()
    {
        $user = Http::get('https://jsonfakery.com/users/random');

        return $user['first_name'] . ' ' . $user['last_name'];
    }
}

class UserDataController extends Controller
{

    public function show()
    {
        $fetcher = new GitHubApi();

        $user_data = $fetcher->fetch();

        return response()->json($user_data);
    }
}