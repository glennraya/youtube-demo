<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

interface UserFetcherApi
{
    public function fetch();
}

class TwitterApi implements UserFetcherApi
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

class GitHubApi implements UserFetcherApi
{
    public function fetch()
    {
        $user = Http::get('https://jsonfakery.com/users/random');

        // Violates the LSP
        return $user['first_name'] . ' ' . $user['last_name'];
    }
}

class UserDataController extends Controller
{

    public function show()
    {
        $data = new TwitterApi();

        $user = $data->fetch();

        return response()->json($user);
    }
}
