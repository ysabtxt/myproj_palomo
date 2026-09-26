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
        <h1>Edit Customer</h1>

        <?php $errors = session()->getFlashdata('errors'); ?>

        <?php if (!empty($errors)): ?>
            <ul style="color: red; text-align: left;">
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

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
        </form>
        <form action="<?= site_url('customers/delete/' . $customer['id']) ?>"
      method="post"
      onsubmit="return confirm('Are you sure you want to delete this customer?');">

    <?= csrf_field() ?>

    <button type="submit" class="delete-button">
        Delete Customer
    </button>
</form>
    </main>

</body>
</html>