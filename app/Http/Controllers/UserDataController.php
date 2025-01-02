<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TwitterApiClient;
use App\Services\ExternalApiService;
use App\Services\GitHubApiClient;

class UserDataController extends Controller
{
    public function showUserData(Request $request)
    {
        $api_client = new GitHubApiClient;

        $external_service_api = new ExternalApiService($api_client);

        $user_data = $external_service_api->getUserData($request->username);

        return response()->json($user_data);
    }
}
