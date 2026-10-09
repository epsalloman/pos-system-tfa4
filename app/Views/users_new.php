<!DOCTYPE html>
<html>
<head>
    <title>Add New User</title>
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

    <h1>Add New User</h1>

    <?php if (session()->has('errors')): ?>
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('users') ?>" method="post">
        <?= csrf_field() ?>

        <div>
            <label for="username">Username</label><br>
            <input
                type="text"
                id="username"
                name="username"
                value="<?= old('username') ?>"
                minlength="3"
                maxlength="50"
                pattern="[A-Za-z0-9]+"
                required
            >
            <small>Letters and numbers only.</small>
        </div>

        <br>

        <div>
            <label for="full_name">Full Name</label><br>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="<?= old('full_name') ?>"
                maxlength="100"
                required
            >
        </div>

        <br>

        <div><label for="password">Password (minimum 8 characters)</label><br>
            <input type="password" id="password" name="password" minlength="8" required autocomplete="new-password"></div><br>
        <button type="submit">Save User</button>
        <a href="<?= site_url('users') ?>">Cancel</a>
    </form>
</body>
</html>
