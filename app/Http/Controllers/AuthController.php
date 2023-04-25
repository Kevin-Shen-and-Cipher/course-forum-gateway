<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    private  string $API_URL;

    public function __construct()
    {
        $envAPI  = env('APP_COURSE_AUTH_API');
        $this->API_URL = "{$envAPI}/posts";
    }

    public function authenticate(Request $request)
    {
        $accountInfo = $request->all();
        $response = Http::get($this->API_URL, $accountInfo);


        return response()->json(compact('token'));
    }


}
