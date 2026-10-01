<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body class="login-page">

    <div class="login-card">

        <h1>Login</h1>

        <?php if (session()->getFlashdata('error')): ?>
            <p class="error-message">
                <?= session()->getFlashdata('error') ?>
            </p>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="post">
            <?= csrf_field() ?>

            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                required
            >

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                required
            >

            <button type="submit">Login</button>
        </form>

    </div>

</body>
</html>