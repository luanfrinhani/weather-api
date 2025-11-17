<?php

namespace Src\Interface\Controller\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class HealthCheckController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json(['message' => 'ok']);
    }
}
