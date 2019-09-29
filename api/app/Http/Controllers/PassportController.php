<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User as UserResource;

class PassportController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = Client::find(1);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $http = new HttpClient();

        $response = $http->post(env('APP_URL') . '/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => $this->client->id,
                'client_secret' => $this->client->secret,
                'username' => $user->email,
                'password' => $request->password,
                'scope' => '*',
            ],
        ]);

        return $response;
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:3',
            'password' => 'required|min:6',
        ]);

        $http = new HttpClient();

        $response = $http->post(env('APP_URL') . '/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => $this->client->id,
                'client_secret' => $this->client->secret,
                'username' => $request->username,
                'password' => $request->password,
                'scope' => '*',
            ],
        ]);

        return $response;
    }

    public function logout()
    {
        $accessToken = Auth::user()->token();

        $accessToken->revoke();

        return 200;
    }

    public function details()
    {
        return new UserResource(auth()->user());
    }
}
