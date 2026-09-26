<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Add Customer</title>
</head>
<body>
    <nav>
        <a href="<?= site_url('/') ?>">Home</a>
        <a href="<?= site_url('about') ?>">About</a>
        <a href="<?= site_url('customers') ?>">Customer Accounts</a>
        <a href="<?= site_url('user') ?>">User Accounts</a>
    </nav>

    <main>
    <h1>Add New Customer</h1>
    

    <?php if (session()->getFlashdata('errors')): ?>
        <ul style="color: red;">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('customers/create') ?>" method="post">

        <?= csrf_field() ?>

        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="<?= old('full_name') ?>">
        <br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= old('email') ?>">
        <br><br>

        <label>Phone:</label><br>
        <input type="text" name="phone" value="<?= old('phone') ?>">
        <br><br>

        <button type="submit">Save Customer</button>
            <a href="javascript:history.back()" class="back-button">
            Back
            </a>
    </form>
            </main>
</body>
</html>