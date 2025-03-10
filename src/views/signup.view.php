<?php include __DIR__ . '/partials/header.php'; ?>

<main>
  <a href="<?= BASE_URL; ?>/index.php">
    <h1>PHP Stock Manager</h1>
  </a>
  <form action="<?= BASE_URL; ?>/signup.php" method="post" id="signup_form">
    <fieldset>
      <legend>Sign up</legend>
      <div>
        <input type="text" id="first_name" name="first_name" placeholder="First name" required />
        <input type="text" id="last_name" name="last_name" placeholder="Last name" required />
      </div>
      <input type="email" id="email" name="email" placeholder="Email" required />
      <div>
        <input type="password" id="password" name="password" placeholder="Password" required />
        <button type="button" id="password_toggle">Show password</button>
      </div>
      <button type="submit" id="submit" disabled>Sign up</button>
    </fieldset>
    <div>
      <p>Already have an account? <a href="<?= BASE_URL; ?>/signin.php">Sign in</a></p>
    </div>
  </form>
  <?php if (isset($error)) : ?>
    <p><?= $error; ?></p>
  <?php endif; ?>
</main>

<?php include __DIR__ . '/partials/footer.php'; ?>