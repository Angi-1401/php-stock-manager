<?php include __DIR__ . '/partials/header.php'; ?>

<header>
  <nav>
    <a href="./profile.php">Profile</a>
    <a href="./signout.php">Logout</a>
  </nav>
</header>
<main>
  <aside>
    <nav>
      <a href="./dashboard.php">Dashboard</a>
      <a href="./stocks.php">Stocks</a>
      <a href="./users.php">Users</a>
    </nav>
  </aside>
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
</main>
<footer></footer>

<?php include __DIR__ . '/partials/footer.php'; ?>