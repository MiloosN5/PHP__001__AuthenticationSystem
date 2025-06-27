<div class="page register-page">
    <h1>Register</h1>
    <form method="POST" action="/register">
        <fieldset>
            <input name="email" placeholder="Email" required>
            <input name="password" type="password" placeholder="Password" required>
        </fieldset>
        <button>Register</button>
    </form>
    <?php render_flash(); ?>
</div>