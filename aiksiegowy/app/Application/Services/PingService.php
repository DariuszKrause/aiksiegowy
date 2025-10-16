<?php
namespace App\Application\Services;

use App\Domain\System\Ping;

final class PingService
{
    public function ping(): array
    {
        $ping = new Ping(status: 'ok');
        return [
            'status' => $ping->status(),
            'time'   => now()->toIso8601String(),
        ];
    }
}
