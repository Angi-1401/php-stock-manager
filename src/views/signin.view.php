<?php include __DIR__ . '/partials/header.php'; ?>

<main>
  <a href="<?= BASE_URL; ?>/index.php">
    <h1>PHP Stock Manager</h1>
  </a>
  <form action="<?= BASE_URL; ?>/signin.php" method="post" id="signin_form">
    <fieldset>
      <legend>Sign in</legend>
      <input type="email" id="email" name="email" placeholder="Email" required />
      <div>
        <input type="password" id="password" name="password" placeholder="Password" required />
        <button type="button" id="password_toggle">Show password</button>
      </div>
      <button type="submit" id="submit" disabled>Sign in</button>
    </fieldset>
    <div>
      <p>Don't have an account? <a href="<?= BASE_URL; ?>/signup.php">Sign up</a></p>
      <p>Forgot your password? <a href="<?= BASE_URL; ?>/forgot-password.php">Reset password</a></p>
    </div>
  </form>
  <?php if (isset($_GET['success']) && $_GET['success'] === '1') : ?>
    <div>
      <p>Registration successful! You can now sign in.</p>
    </div>
  <?php endif; ?>
  <?php if (isset($_GET['success']) && $_GET['success'] === '2') : ?>
    <div>
      <p>New pasword set! You can now sign in.</p>
    </div>
  <?php endif; ?>
  <?php if (isset($error)) : ?>
    <div>
      <p><?= $error; ?></p>
    </div>
  <?php endif; ?>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>