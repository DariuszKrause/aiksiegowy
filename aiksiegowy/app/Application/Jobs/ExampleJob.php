<?php
namespace App\Application\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

final class ExampleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public string $documentId) {}

    public function handle(): void
    {
        // Idempotencja: sprawdź stan dokumentu; jeśli DONE -> return
        // Wykonaj pracę i zapisz efekty (retry-friendly)
    }
}
