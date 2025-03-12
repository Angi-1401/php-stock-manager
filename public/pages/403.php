<?php require_once dirname(__DIR__, 2) . '/src/constants.php'; ?>

<?php include ROOT_PATH . '/src/views/header.php' ?>

<section class="flex items-center justify-center w-full h-full dark:text-white">
  <div class="flex flex-col items-center gap-4">
    <h1 class="text-4xl font-bold">403 Forbidden</h1>
    <p class="text-lg">You don't have permission to access this page.</p>
    <a href="<?= BASE_URL ?>/index.php" class="hover:underline">Go back to the home page</a>
  </div>
</section>

<?php include ROOT_PATH . '/src/views/footer.php' ?>