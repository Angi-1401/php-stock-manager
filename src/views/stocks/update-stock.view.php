<?php include ROOT_PATH . '/src/views/header.php'; ?>

<section>
  <form action="<?= PAGES_URL; ?>/stocks/update-stock.php" method="post" id="update_stock_form">
    <fieldset>
      <legend>Update stock</legend>
      <input type="hidden" name="id" value="<?= $stock_data['id']; ?>" />
      <input
        type="text"
        id="name"
        name="name"
        placeholder="Name"
        value="<?= $stock_data['name']; ?>"
        required />
      <input
        type="text"
        id="description"
        name="description"
        placeholder="Description"
        value="<?= $stock_data['description']; ?>"
        required />
      <input
        type="number"
        id="price"
        name="price"
        placeholder="Price"
        step="0.01"
        min="0"
        value="<?= $stock_data['price']; ?>"
        required />
      <input
        type="number"
        id="quantity"
        name="quantity"
        placeholder="Quantity"
        step="1"
        min="0"
        value="<?= $stock_data['quantity']; ?>"
        required />
      <button type="submit">Update</button>
    </fieldset>
  </form>
</section>

<?php include ROOT_PATH . '/src/views/footer.php'; ?>