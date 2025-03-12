<?php include ROOT_PATH . '/src/views/header.php'; ?>

<section class="flex flex-col items-center md:items-start p-4 w-full">
  <div class="flex items-center justify-between w-full">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-white">Stocks</h1>
    <a
      href="<?= PAGES_URL; ?>/stocks/create-stock.php"
      class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
      Create new stock
    </a>
  </div>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4 mb-4 w-full">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">ID</th>
          <th scope="col" class="px-6 py-3">Name</th>
          <th scope="col" class="px-6 py-3">Description</th>
          <th scope="col" class="px-6 py-3">Price</th>
          <th scope="col" class="px-6 py-3">Stock</th>
          <th scope="col" class="px-6 py-3">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($stocks as $stock) : ?>
          <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
            <td class="px-6 py-4"><?= $stock['id'] ?></td>
            <td class="px-6 py-4"><?= $stock['name'] ?></td>
            <td class="px-6 py-4"><?= $stock['description'] ?></td>
            <td class="px-6 py-4"><?= $stock['price'] ?></td>
            <td class="px-6 py-4"><?= $stock['quantity'] ?></td>
            <td class="flex gap-4 px-6 py-4">
              <a
                href="<?= PAGES_URL; ?>/stocks/update-stock.php?id=<?= $stock['id'] ?>"
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                Edit
              </a>
              <a
                href="<?= PAGES_URL; ?>/stocks/delete-stock.php?id=<?= $stock['id'] ?>"
                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                Delete
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <?php if (isset($_GET['success']) && $_GET['success'] === '1') : ?>
    <div
      class="p-4 mt-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 w-full dark:bg-gray-800 dark:text-green-400"
      role="alert">
      <p>Changes saved.</p>
    </div>
  <?php endif; ?>
</section>

<?php include ROOT_PATH . '/src/views/footer.php'; ?>