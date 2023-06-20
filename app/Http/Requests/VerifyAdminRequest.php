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
        $identify = $this->auth->verify($this);

        return $identify === "admin";
    }
}
