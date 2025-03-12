<?php include ROOT_PATH . '/src/views/header.php'; ?>

<section>
  <form action="<?= PAGES_URL; ?>/users/delete-user.php" method="post" id="delete_user_form">
    <fieldset>
      <legend>Delete user</legend>
      <p>Are you sure you want to delete this user?</p>
      <input type="hidden" name="id" value="<?= $user_data['id']; ?>">
      <button type="submit">Delete</button>
    </fieldset>
  </form>
</section>

<?php include ROOT_PATH . '/src/views/footer.php'; ?>