<?php

namespace App\Http\Controllers;

use App\Services\ExternalApiService;
use App\Services\GitHubApiClient;
use App\Services\TwitterApiClient;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    public function showUserData(Request $request)
    {
        $api_client = new TwitterApiClient;

        $external_service_api = new ExternalApiService($api_client);

        $userData = $external_service_api->getUserData($request->input('username') ?: 'default-user');

        return response()->json($userData);
    }
}
