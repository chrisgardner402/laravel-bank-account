<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

class HealthController extends Controller
{
    public function check(): string
    {
        Log::info('"GET /health"');
        return 'OK';
    }
}
