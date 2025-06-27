<?php

require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/../config/db.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $stmt = $pdo->prepare("UPDATE users SET is_verified = TRUE, verify_token = NULL WHERE verify_token = ?");
    $stmt->execute([$token]);

    if ($stmt->rowCount()) {
        echo "<p>Your account has been verified. <a href='login.php'>Login</a></p>";
    } else {
        echo "<p>Invalid or expired token.</p>";
    }
} else {
    echo "<p>No token provided.</p>";
}
