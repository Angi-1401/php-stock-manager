<?php include __DIR__ . '/partials/header.php'; ?>

<section>
  <form action="<?= BASE_URL; ?>/delete-user.php" method="post" id="delete_user_form">
    <fieldset>
      <legend>Delete user</legend>
      <p>Are you sure you want to delete this user?</p>
      <input type="hidden" name="id" value="<?= $user_data['id']; ?>">
      <button type="submit" id="submit">Delete</button>
    </fieldset>
  </form>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>