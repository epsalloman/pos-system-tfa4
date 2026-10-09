<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
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

    <h1>Edit User</h1>

    <?php if (session()->has('errors')): ?>
        <ul>
            <?php foreach (session('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php $avatar = ! empty($user['avatar']) ? basename($user['avatar']) : 'placeholder.svg'; ?>
    <p>
        <img
            src="<?= base_url('uploads/avatars/' . $avatar) ?>"
            alt="Current avatar of <?= esc($user['full_name']) ?>"
            width="120"
            height="120"
        >
    </p>

    <form
        action="<?= site_url('users/' . $user['id']) ?>"
        method="post"
        enctype="multipart/form-data"
    >
        <?= csrf_field() ?>

        <div>
            <label for="username">Username</label><br>
            <input
                type="text"
                id="username"
                name="username"
                value="<?= old('username', $user['username']) ?>"
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
                value="<?= old('full_name', $user['full_name']) ?>"
                maxlength="100"
                required
            >
        </div>

        <br>

        <div>
            <label for="avatar">Profile Picture</label><br>
            <input
                type="file"
                id="avatar"
                name="avatar"
                accept="image/jpeg,image/png"
            >
            <small>Optional. JPG or PNG only, maximum 2 MB.</small>
        </div>

        <br>

        <button type="submit">Update User</button>
        <a href="<?= site_url('users') ?>">Cancel</a>
    </form>
</body>
</html>
