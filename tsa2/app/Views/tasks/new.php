<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add New Task</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body class="login-page">

    <div class="login-card">

        <h1>Add New Task</h1>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="error-message">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('tasks/create') ?>" method="post">
            <?= csrf_field() ?>

            <label for="title">Task Title</label>
            <input
                type="text"
                id="title"
                name="title"
                value="<?= old('title') ?>"
                required
            >

            <label for="task_date">Task Date</label>
            <input
                type="date"
                id="task_date"
                name="task_date"
                value="<?= old('task_date') ?>"
                required
            >

            <label for="status">Status</label>

            <select id="status" name="status" required>
                <option value="Pending"
                    <?= old('status') === 'Pending' ? 'selected' : '' ?>>
                    Pending
                </option>

                <option value="Complete"
                    <?= old('status') === 'Complete' ? 'selected' : '' ?>>
                    Complete
                </option>
            </select>


            <button type="submit">Add Task</button>

            <a href="<?= base_url('tasks') ?>" class="back-button">
                Back to Tasks
            </a>
        </form>

    </div>

</body>
</html>