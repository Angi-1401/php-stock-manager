<?php
require_once dirname(__DIR__, 2) . '/src/constants.php';
require_once ROOT_PATH . '/src/controllers/AuthController.php';

if (!isset($_SESSION['user'])) {
  header('Location: ' . BASE_URL . '/403.php');
  exit;
}
?>

<?php include ROOT_PATH . '/src/views/header.php' ?>

<section class="flex flex-col items-center md:items-start p-4 w-full">
  <div class="flex items-center justify-between w-full">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-white">Dashboard</h1>
  </div>
  <p class="text-lg text-gray-600 dark:text-gray-400">Welcome, <?= $_SESSION['user']; ?>!</p>
</section>

<?php include ROOT_PATH . '/src/views/footer.php' ?>