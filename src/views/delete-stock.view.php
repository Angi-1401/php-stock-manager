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
    <form action="<?= BASE_URL; ?>/delete-stock.php" method="post" id="delete_stock_form">
      <fieldset>
        <legend>Delete stock</legend>
        <p>Are you sure you want to delete this stock?</p>
        <input type="hidden" name="id" value="<?= $stock_data['id']; ?>">
        <button type="submit" id="submit">Delete</button>
      </fieldset>
    </form>
  </section>
</main>
<footer></footer>

<?php include __DIR__ . '/partials/footer.php'; ?>