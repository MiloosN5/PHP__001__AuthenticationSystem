<?php

require_once __DIR__ . '/../includes/auth.php';

$title = "Not Found";

ob_start();

require __DIR__ . '/../views/404_view.php';

$content = ob_get_clean();

require __DIR__ . '/../views/layout.php';
