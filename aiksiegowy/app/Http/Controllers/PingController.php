<?php
namespace App\Http\Controllers;

use App\Application\Services\PingService;

final class PingController extends Controller
{
    public function __construct(private PingService $service) {}

    public function __invoke()
    {
        return response()->json($this->service->ping(), 200);
    }
}
