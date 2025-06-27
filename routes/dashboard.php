<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/auth.php';

require_auth();

$title = "Dashboard";

ob_start();

require __DIR__ . '/../views/dashboard_view.php';

$content = ob_get_clean();

require __DIR__ . '/../views/layout.php';
