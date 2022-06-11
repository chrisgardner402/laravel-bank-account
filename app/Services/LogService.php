<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogService
{
    /**
     * Log request contents
     *
     * @param Request $request
     * @return void
     */
    public function logRequest(Request $request): void
    {
        Log::info('"' . $request->method() . ' ' . $request->path() . '"');
        Log::debug('headers=' . $request->headers);
    }
}
