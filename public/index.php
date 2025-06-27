<?php

session_start();

$base = dirname($_SERVER['SCRIPT_NAME']);
$base = str_replace('\\', '/', $base);
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if ($base !== '/' && strpos($uri, $base) === 0) {
    $uri = substr($uri, strlen($base));
}
$uri = rtrim($uri, '/');

$routes = [
    '' => __DIR__ . '/../routes/home.php',
    '/dashboard' => __DIR__ . '/../routes/dashboard.php',
    '/login' => __DIR__ . '/../routes/login.php',
    '/register' => __DIR__ . '/../routes/register.php',
    '/logout' => __DIR__ . '/../routes/logout.php',
    '/verify' => __DIR__ . '/../routes/verify.php',
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    http_response_code(404);
    require __DIR__ . '/../routes/404.php';
}
