<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>
    <nav>
        <a href="<?= site_url('/') ?>">Home</a>
        <a href="<?= site_url('about') ?>">About</a>
        <a href="<?= site_url('customers') ?>">Customer Accounts</a>
        <a href="<?= site_url('user') ?>">User Accounts</a>
    </nav>


    <main>
            <?php if (session()->get('isLoggedIn')): ?>
    <span>
        Hello, <?= esc(session()->get('username')) ?>
    </span>
<?php endif; ?>

        <h1>Home Page</h1>
        <p>This is the home page of our website.</p>
    </main>
 <?php if (session()->get('isLoggedIn')): ?>
        <a href="<?= base_url('logout') ?>">Logout</a>
    <?php endif; ?>
</body>
</html>