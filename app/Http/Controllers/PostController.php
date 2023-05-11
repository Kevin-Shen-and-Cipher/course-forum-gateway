<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Requests\PostDestroyRequest;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdataRequest;

class PostController extends Controller
{
    private  string $API_URL;

    public function __construct()
    {
        $envAPI  = env('APP_COURSE_FORUM_API');
        $this->API_URL = "{$envAPI}/posts";
    }

    public function index()
    {
        return Http::get($this->API_URL)->json();
    }

    public function store(PostStoreRequest $request)
    {
        return Http::post($this->API_URL, $request)->json();
    }

    public function show(string $id)
    {
        return Http::get("{$this->API_URL}/{$id}")->json();
    }

    public function update(PostUpdataRequest $request, string $id)
    {
        return Http::patch("{$this->API_URL}/{$id}", $request)->json();
    }

    public function destroy(PostDestroyRequest $request, string $id)
    {
        return Http::delete("{$this->API_URL}/{$id}")->json();
    }
}
