<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<main class="task-container">

    <h1>Task List</h1>

    <?php if (session()->get('isLoggedIn')): ?>
        <div class="user-bar">
            <span>
                Welcome, <?= esc(session()->get('username')) ?>
            </span>

            
        </div>

        <a href="<?= base_url('tasks/new') ?>" class="add-button">
            Add New Task
        </a>
    <?php else: ?>
        <a href="<?= base_url('login') ?>" class="login-button">
            Login
        </a>
    <?php endif; ?>

    <section class="task-list">

        <?php foreach ($tasks as $task): ?>
            <article class="task-card">

                <h2><?= esc($task['title']) ?></h2>

                <p>
                    Date: <?= esc($task['task_date']) ?>
                </p>

                <p class="task-status <?= strtolower($task['status']) ?>">
                    Status: <?= esc($task['status']) ?>
                </p>

                <?php if (session()->get('isLoggedIn')): ?>
                    <div class="task-actions">
                        <a href="<?= base_url('tasks/edit/' . $task['id']) ?>"
                           class="edit-button">
                            Edit
                        </a>

                        <a href="<?= base_url('tasks/delete/' . $task['id']) ?>"
                           class="delete-button"
                           onclick="return confirm('Archive this task?')">
                            Delete
                        </a>
                    </div>
                <?php endif; ?>

            </article>
        <?php endforeach; ?>
<a href="<?= base_url('logout') ?>" class="logout-button">
                Logout
            </a>
    </section>

</main>

</body>
</html>