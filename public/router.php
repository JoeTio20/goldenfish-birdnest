<?php
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$file = __DIR__ . $path;

if ($path !== '/' && is_file($file)) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    $cacheExt = ['jpg','jpeg','png','gif','webp','svg','ico','css','js','woff','woff2','ttf','eot'];
    if (in_array($ext, $cacheExt, true)) {
        header('Cache-Control: public, max-age=31536000, immutable');
        header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
    }
    return false;
}

require __DIR__ . '/index.php';
