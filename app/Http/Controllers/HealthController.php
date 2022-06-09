<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class HealthController extends Controller
{
    /**
     * Health check
     *
     * @return JsonResponse
     */
    public function check(): JsonResponse
    {
        Log::info('"GET /health"');
        return response()->json([
            'status' => 'OK'
        ]);
    }
}
