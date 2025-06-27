<div class="page login-page">
    <h1>Login</h1>
    <form method="POST" action="/login">
        <input name="email" placeholder="Email" required>
        <input name="password" type="password" placeholder="Password" required>
        <button>Login</button>
    </form>
    <?php render_flash(); ?>
</div>