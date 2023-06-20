<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\PostDestroyRequest;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{
    use ApiResponse;
    private string $API_URL;
    private string $SENTIMENT_API;

    public function __construct()
    {
        $envAPI = config('services.api.forum');
        $this->API_URL = "{$envAPI}/posts";
        $this->SENTIMENT_API = config('services.api.sentiment');
    }

    public function index()
    {
        return $this->apiResponse(Http::get($this->API_URL));
    }

    public function store(PostStoreRequest $request)
    {
        $content = [
            "text" => $request->input('content')
        ];

        try {
            $sentimentResponse = Http::post($this->SENTIMENT_API, $content);

            if ($sentimentResponse->ok()) {
                $sentiment_score = $sentimentResponse->json();
            } else {
                $sentiment_score = 0;
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }

        $requestData = $request->all();
        $requestData['sentiment_score'] = $sentiment_score;

        return $this->apiResponse(Http::post($this->API_URL, $requestData));
    }

    public function show(string $id)
    {
        return $this->apiResponse(Http::get("{$this->API_URL}/{$id}"));
    }

    public function update(PostUpdateRequest $request, string $id)
    {
        return $this->apiResponse(Http::patch("{$this->API_URL}/{$id}", $request->all()));
    }

    public function destroy(PostDestroyRequest $request, string $id)
    {
        return $this->apiResponse(Http::delete("{$this->API_URL}/{$id}"));
    }
}
