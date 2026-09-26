<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

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
        <h1>Users Page</h1>

        <a class="add-button" href="<?= site_url('users/new') ?>">
            Add New User
        </a>

        <table>
            <thead>
                <tr>
                    <th>Avatar</th>
                    <th>Username</th>
                    <th>Full Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <?php if (!empty($user['avatar'])): ?>
                                <img
                                    class="avatar"
                                    src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
                                    alt="User Avatar"
                                >
                            <?php else: ?>
                                <img
                                    class="avatar"
                                    src="<?= base_url('images/Avatar.png') ?>"
                                    alt="Default Avatar"
                                >
                            <?php endif; ?>
                        </td>

                        <td><?= esc($user['username']) ?></td>

                        <td><?= esc($user['full_name']) ?></td>

                        <td>
                            <a
                                class="edit-button"
                                href="<?= site_url('users/edit/' . $user['id']) ?>"
                            >
                                Edit
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

</body>
</html>