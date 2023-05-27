<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
class AuthController extends Controller
{
    private string $API_URL_LOGIN;
    private string $API_URL_VERIFY;

    public function __construct()
    {
        $envAPI  = env('APP_COURSE_AUTH_API');
        $this->API_URL_LOGIN = "{$envAPI}/login";
        $this->API_URL_VERIFY = "{$envAPI}/jwt-tokens/verify";
    }

    public function login(Request $request)
    {
       return  Http::post($this->API_URL_LOGIN, $request)->json();
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
            return response("Token is empty", 401);
        }
        return $this->apiResponse(Http::post($this->API_URL_VERIFY, $token));
    }
}
