<?php include __DIR__ . '/partials/header.php'; ?>

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


<?php include __DIR__ . '/partials/footer.php'; ?>