<?php
/**
 * Home.pl CRON — co 5 min
 * Plik MUSI leżeć w: /public_html/cron-5min.php
 * Projekt Laravel: /public_html/aiksiegowy
 */

date_default_timezone_set('Europe/Warsaw');

$publicRoot  = __DIR__;                                   // /public_html
$projectRoot = $publicRoot . '/aiksiegowy';               // /public_html/aiksiegowy
$artisan     = $projectRoot . '/artisan';
$logFile     = $projectRoot . '/storage/logs/cronhome5min.log';

// Staraj się użyć aktualnego interpretera PHP, a jeśli brak — /usr/bin/php
$php = defined('PHP_BINARY') && PHP_BINARY ? PHP_BINARY : '/usr/bin/php';

// sanity-checki do loga
$log = function(string $msg) use ($logFile) {
    @file_put_contents($logFile, '['.date('Y-m-d H:i:s')."] $msg\n", FILE_APPEND);
};

if (!is_file($artisan)) {
    $log("ERROR: artisan not found at: $artisan");
    exit;
}

// uruchomienie schedule:run
$cmd = sprintf('%s %s schedule:run', escapeshellcmd($php), escapeshellarg($artisan));
$log("RUN: $cmd");

$output = [];
$returnVar = 0;
exec($cmd . ' 2>&1', $output, $returnVar);

$log("EXIT=$returnVar");
if ($output) {
    $log("OUT:\n" . implode("\n", $output));
}
