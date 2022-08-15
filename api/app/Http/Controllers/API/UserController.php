<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        if(count($users) > 0) {
            return response()->json(['data' => $users], 200);
        } else {
            return response()->json(['message' => 'No users found'], 404);
        }
    }
    public function show($email)
    {
        $user = User::firstWhere('email', $email);
        if(!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        if(!$user) {
            return response()->json(['message' => 'User not updated'], 404);
        }
        $user->update($request->all());
        return response()->json($user, 200);
    }
    public function delete($email)
    {
        $user = User::firstWhere('email', $email);
        if(!$user) {
            return response()->json(['message' => 'User not deleted'], 404);
        }
        $user->delete();
        return response()->json(null, 204);
    }

    // //login with jwt
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    //     if(!$token = auth()->attempt($credentials)) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }
    //     return $this->respondWithToken($token);
    // }
}
