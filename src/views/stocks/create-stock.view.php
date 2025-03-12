<?php include ROOT_PATH . '/src/views/header.php'; ?>

<section>
  <form action="<?= PAGES_URL; ?>/stocks/create-stock.php" method="post" id="create_stock_form">
    <fieldset>
      <legend>Create stock</legend>
      <input type="text" id="name" name="name" placeholder="Name" required />
      <input type="text" id="description" name="description" placeholder="Description" required />
      <input type="number" id="price" name="price" placeholder="Price" step="0.01" min="0" required />
      <input type="number" id="quantity" name="quantity" placeholder="Quantity" step="1" min="0" required />
      <button type="submit">Create</button>
    </fieldset>
  </form>
</section>


<?php include ROOT_PATH . '/src/views/footer.php'; ?>