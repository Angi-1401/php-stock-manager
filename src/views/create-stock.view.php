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
    <form action="<?= BASE_URL; ?>/create-stock.php" method="post" id="create_stock_form">
      <fieldset>
        <legend>Create stock</legend>
        <input type="text" id="name" name="name" placeholder="Name" required />
        <input type="text" id="description" name="description" placeholder="Description" required />
        <input type="number" id="price" name="price" placeholder="Price" step="0.01" required />
        <input type="number" id="quantity" name="quantity" placeholder="Quantity" required />
        <button type="submit">Create</button>
      </fieldset>
    </form>
  </section>
</main>
<footer></footer>

<?php include __DIR__ . '/partials/footer.php'; ?>