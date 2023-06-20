<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class AuthController extends Controller
{
    use ApiResponse;
    private string $API_URL_LOGIN;
    private string $API_URL_VERIFY;

    public function __construct()
    {
        $envAPI = config('services.api.auth');
        $this->API_URL_LOGIN = "{$envAPI}/login";
        $this->API_URL_VERIFY = "{$envAPI}/verify";
    }

    public function login(Request $request)
    {
        return $this->apiResponse(Http::timeout(0)->post($this->API_URL_LOGIN, $request->only('username', 'password')))->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function verify(Request $request): string
    {
        $token = $request->bearerToken();

        $response = Http::post($this->API_URL_VERIFY, ['token' => $token]);
        
        if ($response->ok()) {
            return $response->json('identify');
        } else {
            return '';
        }
    }
}
