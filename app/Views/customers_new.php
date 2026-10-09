<!DOCTYPE html>
<html>
<head>
    <title>Add New Customer</title>
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

    <h1>Add New Customer</h1>

    <?php if (session()->has('errors')): ?>
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= site_url('customers') ?>" method="post">
        <?= csrf_field() ?>

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

        <div>
            <label for="email">Email</label><br>
            <input
                type="email"
                id="email"
                name="email"
                value="<?= old('email') ?>"
                maxlength="100"
                required
            >
        </div>

        <br>

        <div>
            <label for="phone">Phone</label><br>
            <input
                type="tel"
                id="phone"
                name="phone"
                value="<?= old('phone') ?>"
                inputmode="numeric"
                pattern="09[0-9]{9}"
                maxlength="11"
            >
            <small>Optional. Use 11 digits beginning with 09.</small>
        </div>

        <br>

        <button type="submit">Save Customer</button>
        <a href="<?= site_url('customers') ?>">Cancel</a>
    </form>
</body>
</html>
