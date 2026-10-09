<!DOCTYPE html>
<html>
<head>
    <title>Customer Accounts</title>
</head>
<body>
<nav>
    <a href="<?= site_url('/') ?>">Home</a> |
    <a href="<?= site_url('about') ?>">About</a> |
    <a href="<?= site_url('customers') ?>">Customer Accounts</a> |
    <a href="<?= site_url('users') ?>">User Accounts</a>
 | <span>Signed in: <?= esc((string) session('username')) ?></span>
    <form action="<?= site_url('logout') ?>" method="post" style="display:inline"><?= csrf_field() ?><button type="submit">Logout</button></form>
</nav>

<hr>
    <h1>Customer Accounts</h1>

    <?php if (session()->has('success')): ?>
        <p><?= esc(session('success')) ?></p>
    <?php endif; ?>

    <p><a href="<?= site_url('customers/new') ?>">Add New Customer</a></p>

    <table border="1">
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($customers as $customer): ?>

            <tr>
                <td><?= esc($customer['full_name']) ?></td>
                <td><?= esc($customer['email']) ?></td>
                <td><?= esc($customer['phone']) ?></td>
                <td>
                    <a href="<?= site_url('customers/' . $customer['id'] . '/edit') ?>">Edit</a>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>

</body>
</html>
