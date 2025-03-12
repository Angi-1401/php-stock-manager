<?php include ROOT_PATH . '/src/views/header.php'; ?>

<section class="flex flex-col items-center md:items-start p-4 w-full">
  <div class="flex items-center justify-between w-full">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-white">Stocks</h1>
  </div>
  <div class="self-center w-2/3">
    <form
      action="<?= PAGES_URL; ?>/stocks/delete-stock.php"
      method="post"
      id="delete_stock_form"
      class="flex flex-col gap-4 w-full">
      <fieldset class="flex flex-col gap-2">
        <legend class="text-lg text-gray-600 dark:text-gray-400">Delete stock</legend>
        <p class="text-gray-600 dark:text-gray-400">Are you sure you want to delete this stock?</p>
        <input type="hidden" name="id" value="<?= $stock_data['id']; ?>">
        <button
          type="submit"
          class="text-white bg-red-700 self-center hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
          Delete
        </button>
      </fieldset>
    </form>
  </div>
</section>


<?php include ROOT_PATH . '/src/views/footer.php'; ?>