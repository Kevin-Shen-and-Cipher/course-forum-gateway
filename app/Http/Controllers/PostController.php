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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ddd("{$this->API_URL}/posts");
        $response = Http::get("{$this->API_URL}/posts"); 
        $posts = $response->json();

        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
