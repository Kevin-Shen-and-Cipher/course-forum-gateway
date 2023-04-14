<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\App;

class PostController extends Controller 
{
    private  string $API_URL; 

    public function __construct()
    {
        $this->API_URL=env('APP_COURSE_FORUM_API');
    }

    public function index()
    {
        // ddd("{$this->API_URL}/posts");
        $response = Http::get("{$this->API_URL}/posts"); 
        $posts = $response->json();

        return response()->json($posts);
    }

    public function store(Request $request)
    {
        $data = $request->all(); 
        $response = Http::post("{$this->API_URL}/posts", $data); 
        return $response->json();
    }

    public function show(string $id)
    {
        $response = Http::get("{$this->API_URL}/posts/{$id}"); 
        $posts = $response->json();
        return response()->json($posts);
    }

    public function update(Request $request, string $id)
    {
        $response = Http::patch("{$this->API_URL}/posts/{$id}",$request); 
        $posts = $response->json();
        return response()->json($posts);       
    }

    public function destroy(string $id)
    {
        $response = Http::delete("{$this->API_URL}/posts/{$id}"); 
        $posts = $response->json();
        return response()->json($posts); 
    }
}
