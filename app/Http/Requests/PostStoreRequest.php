<?php

namespace App\Http\Requests;
use App\Http\Requests\VerifyUserRequest;

class PostStoreRequest extends VerifyUserRequest
{
    public function rules(): array
    {
        return [
            'content' => ['required', 'string'],
            'create_by' => ['required', 'string'],
            'score' => ['required', 'integer', 'min:1', 'max:5'],
            'tags' => ['required', 'array'],
            'title' => ['required', 'string'],
        ];
    }
}
