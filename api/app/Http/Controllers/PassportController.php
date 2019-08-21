<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use GuzzleHttp\Client as HttpClient;

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

        return json_decode((string) $response->getBody(), true);
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('CookLog')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }

    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
}
