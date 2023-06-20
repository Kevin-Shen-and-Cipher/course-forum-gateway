<?php

namespace App\Http\Requests;
use App\Http\Requests\VerifyAdminRequest;

class PostUpdateRequest extends VerifyAdminRequest
{
    public function rules(): array
    {
        return [
            'state' => ['required', 'bool'],
        ];
    }
}
