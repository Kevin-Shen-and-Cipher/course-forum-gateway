<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    /**
     * @param Response $response
     * @return JsonResponse
     */
    public function apiResponse(Response $response): JsonResponse
    {
        $data = $response->json();
        $statusCode = $response->status();

        return response()->json($data, $statusCode);
    }
}
