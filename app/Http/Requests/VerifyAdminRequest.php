<?php

namespace App\Http\Requests;

use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Http\FormRequest;

class VerifyAdminRequest extends FormRequest
{
    protected $auth;

    public function __construct(AuthController $auth)
    {
        $this->auth = $auth;
    }
    
    public function authorize()
    {
        $response =$this->auth->verify($this);
        return $this->isAdmin($response);

    }
    public function isAdmin($response)
    {
        $identity = json_decode($response, true);
        return $identity["identity"] === "admin";
    }
}
