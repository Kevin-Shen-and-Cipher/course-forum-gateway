<?php

namespace App\Http\Requests;
use App\Http\Requests\VerifyAdminRequest;

class TagUpdataRequest extends VerifyAdminRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string']
        ];
    }
}
