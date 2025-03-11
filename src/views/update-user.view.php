<?php include __DIR__ . '/partials/header.php'; ?>

<section>
  <form action="<?= BASE_URL; ?>/update-user.php" method="post" id="update_user_form">
    <fieldset>
      <legend>Update user</legend>
      <div>
        <input type="hidden" name="id" value="<?= $user_data['id']; ?>">
        <input type="text" id="first_name" name="first_name" placeholder="First name"
          value="<?= $user_data['first_name']; ?>" required />
        <input type="text" id="last_name" name="last_name" placeholder="Last name"
          value="<?= $user_data['last_name']; ?>" required />
      </div>
      <input type="email" id="email" name="email" placeholder="Email"
        value="<?= $user_data['email']; ?>" required />
      <div>
        <div>
          <input type="radio" name="role" value="1" id="admin_role"
            <?php if ($user_data['role'] == 1) echo 'checked'; ?> />
          <label for="admin_role">Admin</label><br>
        </div>
        <div>
          <input type="radio" name="role" value="2" id="user_role"
            <?php if ($user_data['role'] == 2) echo 'checked'; ?> />
          <label for="user_role">User</label><br>
        </div>
      </div>
      <input type="hidden" id="user_id" name="id" value="<?= $user_data['id']; ?>" />
      <button type="submit" id="submit">Update</button>
    </fieldset>
  </form>
  <?php if (isset($error)) : ?>
    <p><?= $error; ?></p>
  <?php endif; ?>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>