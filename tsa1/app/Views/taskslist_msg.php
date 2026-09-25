<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task List</title>
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
</head>
<body>

<nav>
    <a href="<?= base_url('/') ?>">Welcome</a>
    <a href="<?= base_url('/tasks') ?>">Tasks</a>
    <a href="<?= base_url('/profile') ?>">Profile</a>
    <a href="<?= base_url('/about') ?>">About</a>
</nav>

<h1>Task List</h1>

<table>
    <thead>
        <tr>
            <th>Task</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['status']) ?></td>
                <td><?= esc($task['task_date']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>