<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Requests\vertifyRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private string $API_URL;

    public function __construct()
    {
        $envAPI  = env('APP_COURSE_AUTH_API');
        $this->API_URL = "{$envAPI}/posts";
    }

    public function login(Request $request)
    {
        $data = $request->all();
        $response = Http::post("{$this->API_URL}/login", $data);

        return $response()->json();
    }

    public function vertify(vertifyRequest $request)
    {
        // 參數:token
        // 回傳:身分
        // dd($request,$request->header('Authorization'));
        $token = $request->header('Authorization');
        echo $token;
        // if (empty($token)) {
        //     return  "401";
        // }
        
        // return Http::post("{$this->API_URL}/jwt-tokens/vertify", $token);
        return $token;
    }
}
