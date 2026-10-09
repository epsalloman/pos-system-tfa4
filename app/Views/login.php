<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>POS Staff Login</title>
<style>body{font:16px Arial,sans-serif;background:#f2f4f8;margin:0;display:grid;place-items:center;min-height:100vh}.panel{background:white;padding:32px;border-radius:12px;width:min(360px,85vw);box-shadow:0 6px 24px #0002}label{display:block;margin:15px 0 6px}input{box-sizing:border-box;width:100%;padding:11px;border:1px solid #aaa;border-radius:5px}button{margin-top:20px;padding:12px;width:100%;background:#195c42;color:white;border:0;border-radius:5px;cursor:pointer}.error{color:#a11}</style></head>
<body><main class="panel"><h1>POS Staff Login</h1><p>Sign in to manage accounts.</p>
<?php if (session()->getFlashdata('error')): ?><p class="error" role="alert"><?= esc(session()->getFlashdata('error')) ?></p><?php endif; ?>
<form method="post" action="<?= site_url('login') ?>"><?= csrf_field() ?>
<label for="username">Username</label><input id="username" name="username" autocomplete="username" value="<?= esc(old('username')) ?>" required>
<label for="password">Password</label><input id="password" type="password" name="password" autocomplete="current-password" required>
<button type="submit">Login</button></form></main></body></html>
