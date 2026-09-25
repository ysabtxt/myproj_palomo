<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
</head>
<body>

<nav>
    <a href="<?= base_url('/') ?>">Welcome</a>
    <a href="<?= base_url('/tasks') ?>">Tasks</a>
    <a href="<?= base_url('/profile') ?>">Profile</a>
    <a href="<?= base_url('/about') ?>">About</a>
</nav>

<h1>Profile</h1>

<div class="card">
    <p><strong>Username:</strong> <?= esc($user['username']) ?></p>
    <p><strong>Full Name:</strong> <?= esc($user['full_name']) ?></p>
    <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
</div>

</body>
</html>