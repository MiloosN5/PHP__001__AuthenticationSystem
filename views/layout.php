<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title><?= htmlspecialchars($title ?? 'PHP Auth System') ?></title>
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <div class="page-layout">
    <header class="root-header">
      <h2><?= strtoupper('PHP AUTH SYSTEM') ?></h2>
      <nav>
        <ul>
          <?php if (is_logged_in()): ?>
            <li><a href="/dashboard">Dashboard</a></li>
            <li><a href="/logout">Logout</a></li>
          <?php else: ?>
            <li><a href="/">Home</a></li>
            <li><a href="/login">Login</a> </li>
            <li><a href="/register">Register</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>
    <main>
      <?= $content ?>
    </main>
    <footer>
      &copy; 2025 PHP Auth System
    </footer>
  </div>
</body>

</html>