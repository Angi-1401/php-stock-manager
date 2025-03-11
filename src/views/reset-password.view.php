<?php include __DIR__ . '/partials/header.php'; ?>

<main>
  <a href="<?= BASE_URL; ?>/index.php">
    <h1>PHP Stock Manager</h1>
  </a>
  <form action="<?php echo BASE_URL; ?>/reset-password.php" method="POST" id="reset-password-form">
    <fieldset>
      <legend>Reset Password</legend>
      <input type="hidden" name="reset_token" value="<?= $reset_token; ?>">
      <div>
        <input type="password" name="password" id="password" placeholder="New password" required>
        <button type="button" id="password_toggle">Show password</button>
      </div>
      <button type="submit">Reset Password</button>
    </fieldset>
  </form>
  <?php if (isset($error)) echo "<p>$error</p>"; ?>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>