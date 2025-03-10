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
    <form action="<?= BASE_URL; ?>/update-stock.php" method="post" id="update_stock_form">
      <fieldset>
        <legend>Update stock</legend>
        <input type="hidden" name="id" value="<?= $stock_data['id']; ?>" />
        <input type="text" id="name" name="name" placeholder="Name"
          value="<?= $stock_data['name']; ?>" required />
        <input type="text" id="description" name="description" placeholder="Description"
          value="<?= $stock_data['description']; ?>" required />
        <input type="number" id="price" name="price" placeholder="Price" step="0.01"
          value="<?= $stock_data['price']; ?>" required />
        <input type="number" id="quantity" name="quantity" placeholder="Quantity"
          value="<?= $stock_data['quantity']; ?>" required />
        <button type="submit">Update</button>
      </fieldset>
    </form>
  </section>
</main>
<footer></footer>

<?php include __DIR__ . '/partials/footer.php'; ?>