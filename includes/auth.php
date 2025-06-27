<?php

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/session.php';
require_once __DIR__ . '/mailer.php';
require_once __DIR__ . '/helpers.php';

function register($username, $password)
{
    global $pdo;

    $username = sanitize($username);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $token = bin2hex(random_bytes(32));

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password, verify_token) VALUES (?, ?, ?)");
        $result = $stmt->execute([$username, $passwordHash, $token]);
        sendVerificationEmail($username, $token);

        return true;
    } catch (PDOException $e) {
        if ($e->getCode() == 23505) {
            return 'Username or email already exists.';
        } else {
            return 'Something went wrong. Please try again.';
        }
    }

    return $result;
}

function login($username, $password)
{
    global $pdo;

    $username = sanitize($username);
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user['password'])) {
        return 'Invalid credentials.';
    }

    if (!$user['is_verified']) {
        return 'Please verify your email.';
    }
    session_regenerate_id(true);
    $_SESSION['user'] = [
        'id' => $user['id'],
        'username' => $user['username'],
        'is_verified' => $user['is_verified'],
    ];
    return true;
}

function require_auth(): void
{
    if (!isset($_SESSION['user'])) {
        if (function_exists('set_flash')) {
            set_flash('You must be logged in to access this page.');
        }
        header('Location: /login');
        exit;
    }
}

function is_logged_in()
{
    return isset($_SESSION['user']) && !empty($_SESSION['user']['is_verified']);
}
