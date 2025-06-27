<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/auth.php';

if (is_logged_in()) {
    header("Location: /dashboard");
    exit;
}

$title = "Home";

ob_start();

require __DIR__ . '/../views/home_view.php';

$content = ob_get_clean();

require __DIR__ . '/../views/layout.php';
