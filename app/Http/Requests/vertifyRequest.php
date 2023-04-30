<?php

namespace App\Http\Requests;

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;

class vertifyRequest extends Request

{

    public function authorize(): bool
    {
        $authController = new AuthController();
        $identity = $authController->vertify($this);
        echo $identity;
        return ($identity === 0 || $identity === 1) ? true : false;
    }
    public function rules(): array
    {
        return [
            //
        ];
    }
}
