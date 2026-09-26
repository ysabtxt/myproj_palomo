<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Edit User Info</title>

</head>
 <nav>
        <a href="<?= site_url('/') ?>">Home</a>
        <a href="<?= site_url('about') ?>">About</a>
        <a href="<?= site_url('customers') ?>">Customer Accounts</a>
        <a href="<?= site_url('user') ?>">User Accounts</a>
    </nav>
<form action="<?= base_url('users/update/' . $user['id']) ?>" method="post" enctype="multipart/form-data">

    <main>
    <?= csrf_field() ?>
    <h1>Edit User Info</h1>
    <label>Username</label>
    <input type="text" name="username"
           value="<?= old('username', $user['username']) ?>">

    <label>Full Name</label>
    <input type="text" name="full_name"
           value="<?= old('full_name', $user['full_name']) ?>">

    <label>Current Avatar</label><br>

    <?php if (!empty($user['avatar'])): ?>
        <img src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
             width="100"
             height="100">
    <?php else: ?>
        <img src="<?= base_url('images/Avatar.png') ?>"
             width="100"
             height="100">
    <?php endif; ?>

    <br><br>

    <label>Change Avatar</label>
    <input type="file" name="avatar" accept=".jpg,.jpeg,.png">

    <button type="submit">Update User</button>
     <a href="javascript:history.back()" class="back-button">
            Back
            </a>
</form>
       <form 
    action="<?= site_url('users/delete/' . $user['id']) ?>" 
    method="post"
    onsubmit="return confirm('Are you sure you want to delete this user?');"
    style="display: inline;"
>
    <?= csrf_field() ?>
    <button type="submit" class="delete-button">Delete User</button>
</form>
    </main>