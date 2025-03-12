<?php include ROOT_PATH . '/src/views/header.php'; ?>

<section>
  <form action="<?= PAGES_URL; ?>/stocks/delete-stock.php" method="post" id="delete_stock_form">
    <fieldset>
      <legend>Delete stock</legend>
      <p>Are you sure you want to delete this stock?</p>
      <input type="hidden" name="id" value="<?= $stock_data['id']; ?>">
      <button type="submit">Delete</button>
    </fieldset>
  </form>
</section>


<?php include ROOT_PATH . '/src/views/footer.php'; ?>