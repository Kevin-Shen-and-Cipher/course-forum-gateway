<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $response = Http::get($this->API_URL);
        $posts = $response->json();
        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $response = Http::post($this->API_URL, $data);
        return $response->json();
    }

    public function show(string $id)
    {
        $response = Http::get("{$this->API_URL}/{$id}");
        $posts = $response->json();
        return response()->json($posts);
    }

    public function update(Request $request, string $id)
    {
        $response = Http::patch("{$this->API_URL}/{$id}", $request);
        $posts = $response->json();
        return response()->json($posts);
    }

    public function destroy(string $id)
    {
        $response = Http::delete("{$this->API_URL}/{$id}");
        $posts = $response->json();
        return response()->json($posts);
    }
}
