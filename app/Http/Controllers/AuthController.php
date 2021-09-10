<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{
    public function login(Request $request)
    {
//        $http = new \GuzzleHttp\Client;
//
//        $request->request->add([
//            'grant_type' => 'password',
//            'client_id' => config('services.passport.client_id'),
//            'client_secret' => config('services.passport.client_secret'),
//            'username' => $request->username,
//            'password' => $request->password,
//        ]);
//        $tokenRequest = Request::create(
//            "http://127.0.0.1:8000/oauth/token",
//            'post'
//        );
//
//        $response = Route::dispatch($tokenRequest);
//
//        return $response;
        return 'yes';
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json('Logged out successfully', 200);
    }

    public function update(Request $request ){
        $id = auth()->user()->id;
        $user = User::find($id);

        if ($user) {
            $user->email = $request->item['email'];
            $user->position = $request->item["position"];
            $user->about = $request->item["about"];
            $user->name = $request->item["name"];
//            $user->description = $request->item['description'];
            $user->save();
            return $user;
        }

    }
}
