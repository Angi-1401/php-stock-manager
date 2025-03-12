<?php include ROOT_PATH . '/src/views/header.php'; ?>

<a href="<?= BASE_URL; ?>/index.php">
  <h1>PHP Stock Manager</h1>
</a>
<form action="<?= PAGES_URL; ?>/auth/forgot-password.php" method="POST" id="forgot-password-form">
  <fieldset>
    <legend>Forgot Password</legend>
    <input type="email" id="email" name="email" placeholder="Email" required>
    <button type="submit">Send Reset Link</button>
  </fieldset>
</form>
<?php if (isset($message)) echo "<p>$message</p>"; ?>
<?php if (isset($error)) echo "<p>$error</p>"; ?>

<?php include ROOT_PATH . '/src/views/footer.php'; ?>