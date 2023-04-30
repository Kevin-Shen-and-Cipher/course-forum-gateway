<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Requests\vertifyRequest;

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
        $response = Http::get($this->API_URL);
        $tags = $response->json();
        return response()->json($tags);
    }

    public function store(vertifyRequest $request)
    {
        $data = $request->all();
        $response = Http::post($this->API_URL, $data);
        return $response->json();
    }

    public function show(string $id)
    {
        $response = Http::get("{$this->API_URL}/{$id}");
        $tags = $response->json();
        return response()->json($tags);
    }

    public function update(vertifyRequest $request, string $id)
    {
        $response = Http::patch("{$this->API_URL}/{$id}", $request);
        $tags = $response->json();
        return response()->json($tags);
    }

    public function destroy(vertifyRequest $request, string $id)
    {
        if($request){
        $response = Http::delete("{$this->API_URL}/{$id}");
        $tags = $response->json();
        return response()->json($tags);  
        }
    }
}
