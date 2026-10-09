<!DOCTYPE html>
<html>
<head>
    <title>User Accounts</title>
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
    <h1>User Accounts</h1>

    <?php if (session()->has('success')): ?>
        <p><?= esc(session('success')) ?></p>
    <?php endif; ?>

    <p><a href="<?= site_url('users/new') ?>">Add New User</a></p>

    <table border="1">
    <tr>
        <th>Avatar</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($users as $user): ?>

        <?php $avatar = ! empty($user['avatar']) ? basename($user['avatar']) : 'placeholder.svg'; ?>
        <tr>
            <td>
                <img
                    src="<?= base_url('uploads/avatars/' . $avatar) ?>"
                    alt="Avatar of <?= esc($user['full_name']) ?>"
                    width="72"
                    height="72"
                >
            </td>
            <td><?= esc($user['username']) ?></td>
            <td><?= esc($user['full_name']) ?></td>
            <td><?= esc($user['created_at']) ?></td>
            <td>
                <a href="<?= site_url('users/' . $user['id'] . '/edit') ?>">Edit</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

</body>
</html>
