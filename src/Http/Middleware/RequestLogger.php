<?php

namespace Core\Api\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Core\Api\Models\Logger;

class RequestLogger {

    public function handle($request, \Closure  $next)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
        /** @var Request $request */
        /** @var Response $response */
        Logger::create(['request' => $request, 'response' => $response]);
        Log::info('app.requests', [
            'request' => json_encode(['headers' => $request->header(),'parameters' => $request->all()]),
            'response' => json_encode(['exception' => $response->exception,'status' => $response->status()]),
        ]);
    }

}
