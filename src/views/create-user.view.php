<?php include __DIR__ . '/partials/header.php'; ?>

<section>
  <form action="<?= BASE_URL; ?>/create-user.php" method="post" id="create_user_form">
    <fieldset>
      <legend>Create user</legend>
      <div>
        <input type="text" id="first_name" name="first_name" placeholder="First name" required />
        <input type="text" id="last_name" name="last_name" placeholder="Last name" required />
      </div>
      <input type="email" id="email" name="email" placeholder="Email" required />
      <div>
        <input type="password" id="password" name="password" placeholder="Password" required />
        <button type="button" id="password_toggle">Show password</button>
      </div>
      <div>
        <div>
          <input type="radio" name="role" value="1" id="admin_role">
          <label for="admin_role">Admin</label><br>
        </div>
        <div>
          <input type="radio" name="role" value="2" id="user_role" checked>
          <label for="user_role">User</label><br>
        </div>
      </div>
      <button type="submit" id="submit" disabled>Create</button>
    </fieldset>
  </form>
  <?php if (isset($error)) : ?>
    <p><?= $error; ?></p>
  <?php endif; ?>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>