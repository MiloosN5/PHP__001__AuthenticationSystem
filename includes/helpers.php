<?php

require_once __DIR__ . '/../includes/session.php';

function sanitize($data)
{
    return htmlspecialchars(trim($data));
}

function set_flash(string $message, string $type = 'info'): void
{
    $_SESSION['flash'] = [
        'message' => $message,
        'type' => $type
    ];
}

function get_flash(): ?array
{
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

function render_flash(): void
{
    $flash = get_flash();
    if ($flash) {
        $color = match ($flash['type']) {
            'error' => 'red',
            'success' => 'green',
            'warning' => 'orange',
            default => 'black'
        };

        echo "<p class='message' style='color: $color'>" . ($flash['message']) . "</p>";
    }
}
