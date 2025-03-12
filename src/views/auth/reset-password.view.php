<?php include ROOT_PATH . '/src/views/header.php'; ?>

<section class="flex items-center justify-center w-full h-full">
  <div class="flex flex-col items-center gap-4 md:w-1/3">
    <a href="<?= BASE_URL; ?>/index.php">
      <h1 class="text-4xl font-bold text-gray-800 dark:text-white">PHP Stock Manager</h1>
    </a>
    <form
      action="<?= PAGES_URL; ?>/auth/reset-password.php"
      method="post"
      id="reset-password-form"
      class="flex flex-col gap-4 w-full">
      <fieldset class="flex flex-col gap-2">
        <legend class="text-lg text-gray-600 dark:text-gray-400">Reset Password</legend>
        <input type="hidden" id="reset_token" name="reset_token" value="<?= $reset_token; ?>">
        <div id="password_container" class="flex items-center gap-2">
          <input
            type="password"
            name="password"
            id="password"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="New password"
            required>
          <button
            type="button"
            id="password_toggle"
            class="text-white bg-blue-700 self-center max-w-fit hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center disabled:bg-blue-400">
            <i class="fa-regular fa-eye"></i>
          </button>
        </div>
        <button
          type="submit"
          class="text-white bg-blue-700 self-center hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center disabled:bg-blue-400">
          Reset Password
        </button>
      </fieldset>
    </form>
    <?php if (isset($error)) : ?>
      <div
        class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
        role="alert">
        <p><?= $error; ?></p>
      </div>
    <?php endif; ?>
  </div>
</section>

<?php include ROOT_PATH . '/src/views/footer.php'; ?>