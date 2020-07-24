<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class LocalOAuth2Controller extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = Client::where(['password_client' => true, 'revoked' => false])->first();
    }

    public function AccessToken(Request $request)
    {
        $tokenRequest = Request::create('/oauth/token', 'POST', [
            'grant_type' => 'password',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ]);
        $response = app()->handle($tokenRequest);

        if ($response->status() === 200) {
            return $response;
        }

        $returnResponse = [
            'message' => trans('auth.failed'),
            'oauth2_response' => json_decode($response->getContent())
        ];

        return response()->json($returnResponse, 404);
    }

    public function RefreshToken(Request $request)
    {
        $tokenRequest = Request::create('/oauth/token', 'POST', [
            'grant_type'    => 'refresh_token',
            'client_id'     => $this->client->id,
            'client_secret' => $this->client->secret,
            'refresh_token' => $request->input('refresh_token'),
        ]);
        $response = app()->handle($tokenRequest);

        return $response;
    }

    public function Logout(Request $request)
    {
        auth()->user()->token()->revoke();
        return response()->json(null, 204);
    }

    public function DeleteToken(Request $request)
    {
        auth()->user()->token()->revoke();
        return response()->json(null, 204);
    }
}
