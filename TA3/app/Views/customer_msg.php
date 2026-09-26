<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>

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
        
    <h1>Customers Page</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;">
            <?= session()->getFlashdata('success') ?>
        </p>
    <?php endif; ?>

    <a class="add-button" href="<?= site_url('customers/new') ?>">
        Add New Customer
    </a>

    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?= esc($customer['full_name']) ?></td>
                    <td><?= esc($customer['email']) ?></td>
                    <td><?= esc($customer['phone']) ?></td>

                    <td>
                        <a class="edit-button"
                           href="<?= site_url('customers/edit/' . $customer['id']) ?>">
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