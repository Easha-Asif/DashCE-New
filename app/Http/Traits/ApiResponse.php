<?php

namespace App\Http\Traits;

/**
 * Api Response Trait
 */
trait ApiResponse
{
    public function apiErrorResponse($message = "Failed", $data = [], $statusCode = 500)
    {
        return response()->json([
            "status" => 0,
            "message" => $message,
            "data" => $data
        ], $statusCode);
    }

    public function apiSuccessResponse($message = "Success", $data = [], $statusCode = 200)
    {
        return response()->json([
            "status" => 1,
            "message" => $message,
            "data" => $data
        ], $statusCode);
    }
}
