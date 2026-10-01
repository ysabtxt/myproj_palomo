<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h1>Login</h1>

<?php if (session()->getFlashdata('error')): ?>
    <p style="color: red;">
        <?= session()->getFlashdata('error') ?>
    </p>
<?php endif; ?>

<?php if (session()->getFlashdata('success')): ?>
    <p style="color: green;">
        <?= session()->getFlashdata('success') ?>
    </p>
<?php endif; ?>

<form action="<?= base_url('login') ?>" method="post">
    <?= csrf_field() ?>

    <label>Username</label>
    <input type="text" name="username" required>

    <br><br>

    <label>Password</label>
    <input type="password" name="password" required>

    <br><br>

    <button type="submit">Login</button>
</form>

</body>
</html>