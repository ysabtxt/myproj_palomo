<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
</head>
<body>

<nav>
    <a href="<?= base_url('/') ?>">Welcome</a>
    <a href="<?= base_url('/tasks') ?>">Tasks</a>
    <a href="<?= base_url('/profile') ?>">Profile</a>
    <a href="<?= base_url('/about') ?>">About</a>
</nav>

<h1>Welcome</h1>
<p>Today's tasks</p>

<div class="card">
    <?php if (!empty($tasks)): ?>
        <?php foreach ($tasks as $task): ?>
            <div class="task">
                <strong><?= esc($task['title']) ?></strong>
                <div class="status"><?= esc($task['status']) ?></div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No tasks for today.</p>
    <?php endif; ?>
</div>

</body>
</html>