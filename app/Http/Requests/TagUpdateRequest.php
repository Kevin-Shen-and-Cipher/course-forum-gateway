<?php

namespace App\Http\Requests;
use App\Http\Requests\VerifyAdminRequest;

class TagUpdateRequest extends VerifyAdminRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string']
        ];
    }
}
