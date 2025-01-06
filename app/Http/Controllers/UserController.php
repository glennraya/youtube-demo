<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

interface UserFetcherInterface
{
    public function fetchUserById(Request $request);
    public function fetchAllUsers();
}

interface UserPermissionManagerInterface
{
    public function grantPermission(int $user_id, string $permission);
    public function revokePermission(int $user_id, string $permission);
}

class UserPermissionService implements UserPermissionManagerInterface
{
    public function grantPermission(int $user_id, string $permission)
    {
        // grant permission logic goes here...
    }

    public function revokePermission(int $user_id, string $permission)
    {
        // revoke permission logic goes here.
    }
}

class UserController extends Controller implements UserFetcherInterface
{
    public function fetchUserById(Request $request)
    {
        return User::find($request->id);
    }

    public function fetchAllUsers()
    {
        return User::paginate(10);
    }
}
