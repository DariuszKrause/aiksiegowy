<?php
namespace App\Domain\System;

final class Ping
{
    public function __construct(private string $status) {}

    public function status(): string
    {
        return $this->status;
    }
}
