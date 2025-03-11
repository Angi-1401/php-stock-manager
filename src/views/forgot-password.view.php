<?php include __DIR__ . '/partials/header.php'; ?>

<main>
  <a href="<?= BASE_URL; ?>/index.php">
    <h1>PHP Stock Manager</h1>
  </a>
  <form action="<?= BASE_URL; ?>/forgot-password.php" method="POST" id="forgot-password-form">
    <fieldset>
      <legend>Forgot Password</legend>
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required>
      <button type="submit">Send Reset Link</button>
    </fieldset>
  </form>
  <?php if (isset($message)) echo "<p>$message</p>"; ?>
  <?php if (isset($error)) echo "<p>$error</p>"; ?>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>