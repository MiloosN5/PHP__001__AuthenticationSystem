<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = login($_POST['email'], $_POST['password']);

    if ($result === true) {
        set_flash('Login successful!', 'success');
        header('Location: /dashboard');
        exit;
    } else {
        set_flash($result, 'error');
    }
}

$title = 'Login';

ob_start();

require __DIR__ . '/../views/login_form.php';

$content = ob_get_clean();
require __DIR__ . '/../views/layout.php';
