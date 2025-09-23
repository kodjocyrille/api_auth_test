<?php

namespace App\Traits;

use App\Traits\ApiResponses;
use Illuminate\Http\Request;

 trait ApiResponses
{
    protected function success($message, $statusCode = 200)
    {
        return response()->json([
            'code' => $statusCode,
            'message' => $message,
        ], $statusCode);
    }

    protected function ok($message)
    {
        return $this->success($message, 200);
    }

    protected function badRequest($message, $statusCode )
    {
        return response()->json([
            'code' => $statusCode,
            'message' => $message,
        ], 400);
    }
}