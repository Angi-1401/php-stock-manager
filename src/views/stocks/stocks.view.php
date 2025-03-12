<?php include ROOT_PATH . '/src/views/header.php'; ?>

<section>
  <h1>Stocks</h1>
  <div>
    <a href="<?= PAGES_URL; ?>/stocks/create-stock.php">Create new stock</a>
  </div>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($stocks as $stock) : ?>
        <tr>
          <td><?= $stock['id'] ?></td>
          <td><?= $stock['name'] ?></td>
          <td><?= $stock['description'] ?></td>
          <td><?= $stock['price'] ?></td>
          <td><?= $stock['quantity'] ?></td>
          <td>
            <a href="<?= PAGES_URL; ?>/stocks/update-stock.php?id=<?= $stock['id'] ?>">Edit</a>
            <a href="<?= PAGES_URL; ?>/stocks/delete-stock.php?id=<?= $stock['id'] ?>">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>
<section>
  <?php if (isset($_GET['success']) && $_GET['success'] === '1') : ?>
    <div>
      <p>Changes saved.</p>
    </div>
  <?php endif; ?>
</section>

<?php include ROOT_PATH . '/src/views/footer.php'; ?>