<?php include ROOT_PATH . '/src/views/header.php'; ?>

<section class="flex items-center justify-center w-full h-full">
  <div class="flex flex-col items-center gap-4 md:w-2/3">
    <a href="<?= BASE_URL; ?>/index.php">
      <h1 class="text-4xl font-bold text-gray-800 dark:text-white">PHP Stock Manager</h1>
    </a>
    <form
      action="<?= PAGES_URL; ?>/auth/signup.php"
      method="post"
      id="signup_form"
      class="flex flex-col gap-4 w-full">
      <fieldset class="flex flex-col gap-2">
        <legend class="text-lg text-gray-600 dark:text-gray-400">Sign up</legend>
        <div id="name_container" class="flex items-center gap-2">
          <input
            type="text"
            id="first_name"
            name="first_name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="First name"
            required />
          <input
            type="text"
            id="last_name"
            name="last_name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Last name"
            required />
        </div>
        <input
          type="email"
          id="email"
          name="email"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Email"
          required />
        <div id="password_container" class="flex items-center gap-2">
          <input
            type="password"
            id="password"
            name="password"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Password"
            required />
          <button
            type="button"
            id="password_toggle"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center">
            <i class="fa-regular fa-eye"></i>
          </button>
        </div>
        <button
          type="submit"
          class="text-white bg-blue-700 self-center max-w-fit hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center disabled:bg-blue-400"
          disabled>
          Sign up
        </button>
      </fieldset>
      <div class="flex flex-col items-center justify-center gap-2">
        <p class="text-sm text-gray-600 dark:text-gray-400">
          Already have an account?
          <a href="<?= PAGES_URL; ?>/auth/signin.php" class="hover:underline">Sign in</a>
        </p>
      </div>
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