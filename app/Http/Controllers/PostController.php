<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\PostDestroyRequest;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdataRequest;

class PostController extends Controller
{
    use ApiResponse;
    private string $API_URL;
    
    public function __construct()
    {
        $envAPI = env('APP_COURSE_FORUM_API');
        $this->API_URL = "{$envAPI}/posts";
    }

    public function index()
    {
        return $this->apiResponse(Http::get($this->API_URL));
    }

    public function store(PostStoreRequest $request)
    {
        return $this->apiResponse(Http::post($this->API_URL, $request->all()));
    }

    public function show(string $id)
    {
        return $this->apiResponse(Http::get("{$this->API_URL}/{$id}"));
    }

    public function update(PostUpdataRequest $request, string $id)
    {
        return $this->apiResponse(Http::patch("{$this->API_URL}/{$id}", $request->all()));
    }

    public function destroy(PostDestroyRequest $request, string $id)
    {
        return $this->apiResponse(Http::delete("{$this->API_URL}/{$id}"));
    }
}
