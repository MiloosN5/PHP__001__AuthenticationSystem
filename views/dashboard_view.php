<div class="page dashboard-page">
    <h1>Dashboard</h1>
    <?php
    if (isset($_SESSION['user']['username'])) {
        $username = sanitize($_SESSION['user']['username']);
        $msg = "Welcome, <strong>$username</strong>!";
        set_flash($msg, 'success');
        render_flash();
    } else { ?>
        <p>You are not logged in.</p>
        <a href='/login'>Login</a>
    <?php } ?>
</div>