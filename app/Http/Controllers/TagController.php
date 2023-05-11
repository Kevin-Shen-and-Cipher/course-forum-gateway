<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Requests\TagDestroyRequest;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdataRequest;

class TagController extends Controller
{
    private  string $API_URL;

    public function __construct()
    {
        $envAPI  = env('APP_COURSE_FORUM_API');
        $this->API_URL = "{$envAPI}/tags";
    }

    public function index()
    {
        return Http::get($this->API_URL)->json();
    }

    public function store(TagStoreRequest $request)
    {
        return Http::post($this->API_URL, $request)->json();
    }

    public function show(string $id)
    {
        return Http::get("{$this->API_URL}/{$id}")->json();
    }

    public function update(TagUpdataRequest $request, string $id)
    {
        return Http::patch("{$this->API_URL}/{$id}", $request)->json();
    }

    public function destroy(TagDestroyRequest $request, string $id)
    {
        return Http::delete("{$this->API_URL}/{$id}")->json();  
    }
}
