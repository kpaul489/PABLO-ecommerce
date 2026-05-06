<?php

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// Try to serve static files from public directory
if ($uri !== '/') {
    $paths = [
        __DIR__.'/public'.$uri,           // Direct file in public
        __DIR__.'/public/storage'.$uri,   // Storage symlink in public
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
            $mimes = [
                'css' => 'text/css',
                'js' => 'application/javascript',
                'png' => 'image/png',
                'jpg' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'gif' => 'image/gif',
                'svg' => 'image/svg+xml',
                'ico' => 'image/x-icon',
                'jfif' => 'image/jpeg',
                'webp' => 'image/webp',
            ];

            if (isset($mimes[$ext])) {
                header('Content-Type: '.$mimes[$ext]);
            }

            readfile($path);
            exit;
        }
    }
}

require_once __DIR__.'/public/index.php';
