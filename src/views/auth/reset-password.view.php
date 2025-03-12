<?php include ROOT_PATH . '/src/views/header.php'; ?>

<a href="<?= BASE_URL; ?>/index.php">
  <h1>PHP Stock Manager</h1>
</a>
<form action="<?= PAGES_URL; ?>/auth/reset-password.php" method="POST" id="reset-password-form">
  <fieldset>
    <legend>Reset Password</legend>
    <input type="hidden" id="reset_token" name="reset_token" value="<?= $reset_token; ?>">
    <div>
      <input type="password" name="password" id="password" placeholder="New password" required>
      <button type="button" id="password_toggle">Show password</button>
    </div>
    <button type="submit">Reset Password</button>
  </fieldset>
</form>
<?php if (isset($error)) echo "<p>$error</p>"; ?>

<?php include ROOT_PATH . '/src/views/footer.php'; ?>