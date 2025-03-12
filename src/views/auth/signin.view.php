<?php include ROOT_PATH . '/src/views/header.php'; ?>

<section class="flex items-center justify-center w-full h-full">
  <div class="flex flex-col items-center gap-4 md:w-1/3">
    <a href="<?= BASE_URL; ?>/index.php">
      <h1 class="text-4xl font-bold text-gray-800 dark:text-white">PHP Stock Manager</h1>
    </a>
    <form
      action="<?= PAGES_URL; ?>/auth/signin.php"
      method="post"
      id="signin_form"
      class="flex flex-col gap-4 w-full">
      <fieldset class="flex flex-col gap-2">
        <legend class="text-lg text-gray-600 dark:text-gray-400">Sign in</legend>
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
          Sign in
        </button>
      </fieldset>
      <div class="flex flex-col items-center justify-center gap-2">
        <p class="text-sm text-gray-600 dark:text-gray-400">
          Don't have an account?
          <a href="<?= PAGES_URL; ?>/auth/signup.php" class="hover:underline">Sign up</a>
        </p>
        <p class="text-sm text-gray-600 dark:text-gray-400">
          Forgot your password?
          <a href="<?= PAGES_URL; ?>/auth/forgot-password.php" class="hover:underline">Reset password</a>
        </p>
      </div>
    </form>
    <?php if (isset($_GET['success']) && $_GET['success'] === '1') : ?>
      <div
        class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <p>Registration successful! You can now sign in.</p>
      </div>
    <?php endif; ?>
    <?php if (isset($_GET['success']) && $_GET['success'] === '2') : ?>
      <div
        class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <p>New pasword set! You can now sign in.</p>
      </div>
    <?php endif; ?>
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