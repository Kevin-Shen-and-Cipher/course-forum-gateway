<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    private string $API_URL_Login;
    private string $API_URL_Vertify;

    public function __construct()
    {
        $envAPI  = env('APP_COURSE_AUTH_API');
        $this->API_URL_Login = "{$envAPI}/login";
        $this->API_URL_Vertify = "{$envAPI}/jwt-tokens/verify";
    }

    public function login(Request $request)
    {
        $data = $request->all();
        $response = Http::post("{$this->API_URL_Login}/login", $data);
        return $response()->json();
    }

    public function verify(Request $request)
    {
        $token = $request->header('Authorization');
        try{
            $token = str_replace('Bearer ', '', $token);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred'],  $e->getMessage());
        }
        if (empty($token)) {
            return  "401";
        }
        return Http::post("{$this->API_URL_Vertify}/jwt-tokens/verify", $token);
    }
}
