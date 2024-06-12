<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait HasApiResponse
{
    /**
     * @param array|string $data
     * @param string|null $message
     * @param int|null $code
     * @return JsonResponse
     */
    protected function success($data, string $message = null, int $code = 200): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'type' => 'success',
            'data' => $data
        ], $code);
    }

    /**
     * @param string|null $message
     * @param int $code
     * @param array|string|null $data
     * @return JsonResponse
     */
    protected function warning(string $message = null, int $code = 200, $data = null): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'type' => 'warning',
            'data' => $data
        ], $code);
    }

    /**
     * @param string|null $message
     * @param int $code
     * @param array|string|null $data
     * @return JsonResponse
     */
    protected function error(string $message = null, int $code = 200, $data = null): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'type' => 'error',
            'data' => $data
        ], $code);
    }
}
