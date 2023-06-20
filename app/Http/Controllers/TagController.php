<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\TagDestroyRequest;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;

class TagController extends Controller
{
    use ApiResponse;
    private  string $API_URL;

    public function __construct()
    {
        $envAPI = config('services.api.forum');
        $this->API_URL = "{$envAPI}/tags";
    }

    public function index()
    {
        return $this->apiResponse(Http::get($this->API_URL));
    }

    public function store(TagStoreRequest $request)
    {
        return $this->apiResponse(Http::post($this->API_URL, $request->all()));
    }

    public function show(string $id)
    {
        return $this->apiResponse(Http::get("{$this->API_URL}/{$id}"));
    }

    public function update(TagUpdateRequest $request, string $id)
    {
        return $this->apiResponse(Http::patch("{$this->API_URL}/{$id}", $request->all()));
    }

    public function destroy(TagDestroyRequest $request, string $id)
    {
        return $this->apiResponse(Http::delete("{$this->API_URL}/{$id}"));
    }
}
