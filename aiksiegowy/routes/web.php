<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — aiksiegowy
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/healthz', function () {
    return response()->json([
        'status' => 'ok',
        'app'    => config('app.name'),
        'env'    => config('app.env'),
        'time'   => now()->toIso8601String(),
        'php'    => PHP_VERSION,                                 // np. 8.4.12
        'server' => $_SERVER['SERVER_SOFTWARE'] ?? 'unknown',    // np. Apache/uWSGI
    ], 200);
});

/**
 * Prosta trasa diagnostyczna: wersja Laravela i PHP.
 * URL: https://aiksiegowy.online/version
 */
Route::get('/version', function () {
    return response()->json([
        'laravel' => app()->version(),   // np. Laravel v11.46.1
        'php'     => PHP_VERSION,        // np. 8.4.12
    ], 200);
});

// Dodaj ten wpis do routes/web.php:
use App\Http\Controllers\PingController;
Route::get('/mvp', PingController::class); // MVP: Controller → Service → Domain
