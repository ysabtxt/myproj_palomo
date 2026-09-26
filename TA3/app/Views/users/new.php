<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add User</title>

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
    <form action="<?= site_url('users/create') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <h1>Add New User</h1>

        <label for="username">Username</label>
        <input 
            type="text" 
            id="username" 
            name="username" 
            value="<?= esc(old('username')) ?>"
        >

        <label for="full_name">Full Name</label>
        <input 
            type="text" 
            id="full_name" 
            name="full_name" 
            value="<?= esc(old('full_name')) ?>"
        >

        <label for="avatar">Profile Picture</label>
        <input 
            type="file" 
            id="avatar" 
            name="avatar" 
            accept=".jpg,.jpeg,.png"
        >

        <button type="submit">Save User</button>

        <a href="javascript:history.back()" class="back-button">
            Back
        </a>
    </form>
</main>

</body>
</html>