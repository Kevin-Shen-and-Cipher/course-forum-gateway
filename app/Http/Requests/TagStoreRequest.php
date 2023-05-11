<?php

namespace App\Http\Requests;
use App\Http\Requests\VerifyUserRequest;

class TagStoreRequest extends VerifyAdminRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
        ];
    }
}
