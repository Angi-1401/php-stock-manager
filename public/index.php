<?php include '../src/constants.php'; ?>

<?php include ROOT_PATH . '/src/views/header.php' ?>

<section class="flex items-center justify-center w-full h-full">
  <div class="flex flex-col items-center gap-4">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-white">PHP Stock Manager</h1>
    <p class="text-lg text-gray-600 dark:text-gray-400">Manage your stocks easily.</p>
    <div class="flex items-center gap-4">
      <a
        href="<?= PAGES_URL; ?>/auth/signin.php"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Sign in
      </a>
      <a
        href="<?= PAGES_URL; ?>/auth/signup.php"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Sign up
      </a>
    </div>
  </div>
</section>

<?php include ROOT_PATH . '/src/views/footer.php' ?>