<?php include ROOT_PATH . '/src/views/header.php'; ?>

<section class="flex flex-col items-center md:items-start p-4 w-full">
  <div class="flex items-center justify-between w-full">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-white">Update Stock</h1>
  </div>
  <div class="self-center w-2/3">
    <form
      action="<?= PAGES_URL; ?>/stocks/update-stock.php"
      method="post"
      id="update_stock_form"
      class="flex flex-col gap-4 w-full">
      <fieldset class="flex flex-col gap-4">
        <legend class="text-lg text-gray-600 dark:text-gray-400">Update stock</legend>
        <input type="hidden" name="id" value="<?= $stock_data['id']; ?>" />
        <input
          type="text"
          id="name"
          name="name"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Name"
          value="<?= $stock_data['name']; ?>"
          required />
        <input
          type="text"
          id="description"
          name="description"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Description"
          value="<?= $stock_data['description']; ?>"
          required />
        <input
          type="number"
          id="price"
          name="price"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Price"
          step="0.01"
          min="0"
          value="<?= $stock_data['price']; ?>"
          required />
        <input
          type="number"
          id="quantity"
          name="quantity"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Quantity"
          step="1"
          min="0"
          value="<?= $stock_data['quantity']; ?>"
          required />
        <button
          type="submit"
          class="text-white bg-blue-700 self-center hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center disabled:bg-blue-400">
          Update
        </button>
      </fieldset>
    </form>
  </div>
</section>

<?php include ROOT_PATH . '/src/views/footer.php'; ?>