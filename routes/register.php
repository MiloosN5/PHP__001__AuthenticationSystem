<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../includes/helpers.php';
require_once __DIR__ . '/../includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = register($_POST['email'], $_POST['password']);

    if ($result === true) {
        set_flash('Registration successful! Please log in.', 'success');
        header('Location: /login');
        exit;
    } else {
        set_flash($result, 'error');
    }
}

$title = 'Register';

ob_start();

require __DIR__ . '/../views/register_form.php';

$content = ob_get_clean();
require __DIR__ . '/../views/layout.php';
