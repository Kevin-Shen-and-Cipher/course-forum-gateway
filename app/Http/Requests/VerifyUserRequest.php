<?php

namespace App\Http\Requests;

use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Http\FormRequest;

class VerifyUserRequest extends FormRequest
{
    protected $auth;

    public function __construct(AuthController $auth)
    {
        $this->auth = $auth;
    }

    public function authorize()
    {
        $response =$this->auth->verify($this);
        return $this->isUser($response);
    }

    public function isUser($response)
    {
        $identity = json_decode($response, true);
        return $identity["identity"] === "user";
    }
}
