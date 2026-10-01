<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
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

        <h1>Edit Customer</h1>

        <form action="<?= site_url('customers/update/' . $customer['id']) ?>" method="post">

            <?= csrf_field() ?>

            <label for="full_name">Full Name:</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="<?= old('full_name', $customer['full_name']) ?>"
            >

            <label for="email">Email:</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?= old('email', $customer['email']) ?>"
            >

            <label for="phone">Phone:</label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="<?= old('phone', $customer['phone']) ?>"
            >

            <button type="submit">Update Customer</button>

             <a href="javascript:history.back()" class="back-button">
            Back
            </a>
            <form action="<?= site_url('customers/delete/' . $customer['id']) ?>"
                method="post"
                onsubmit="return confirm('Are you sure you want to delete this customer?');">

                <?= csrf_field() ?>

                <button type="submit" class="delete-button">
                    Delete Customer
                </button>
            </form>
        </form>
       
    </main>
 <?php if (session()->get('isLoggedIn')): ?>
        <a href="<?= base_url('logout') ?>">Logout</a>
    <?php endif; ?>
</body>
</html>