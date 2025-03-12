<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Stock Manager</title>
  <?php
  $scriptPath = $_SERVER['SCRIPT_NAME'];
  $depth = substr_count($scriptPath, '/') - substr_count('/public/pages/', '/');
  $cssPath = str_repeat('../', $depth) . 'css/output.css';
  ?>
  <link rel="stylesheet" href="<?php echo $cssPath; ?>">
  <script src="https://kit.fontawesome.com/c640c833fe.js" crossorigin="anonymous"></script>
</head>

<body class="h-screen bg-white dark:bg-gray-900">
  <div class="flex flex-col h-full">
    <?php if (isset($_SESSION['user'])) : ?>
      <header class="w-full bg-gray-200 dark:bg-gray-800">
        <nav class="flex items-center justify-end space-x-2 p-4">
          <a
            href="<?= PAGES_URL; ?>/auth/profile.php"
            class="text-gray-800 dark:text-gray-200 hover:underline">
            Profile
          </a>
          <a
            href="<?= PAGES_URL; ?>/auth/signout.php"
            class="text-gray-800 dark:text-gray-200 hover:underline">
            Logout
          </a>
        </nav>
      </header>
    <?php endif; ?>
    <main class="flex flex-1 flex-col md:flex-row w-full">
      <?php if (isset($_SESSION['user'])) : ?>
        <aside class="h-fit-content md:h-full w-full md:w-1/6 bg-gray-200 dark:bg-gray-800">
          <nav class="flex md:flex-col items-center md:items-start justify-center md:justify-start space-x-2 md:space-y-2 p-4">
            <a
              href="<?= PAGES_URL; ?>/dashboard.php"
              class="text-gray-800 dark:text-gray-200 hover:underline">
              Dashboard
            </a>
            <a
              href="<?= PAGES_URL; ?>/stocks/stocks.php"
              class="text-gray-800 dark:text-gray-200 hover:underline">
              Stocks
            </a>
            <a
              href="<?= PAGES_URL; ?>/users/users.php"
              class="text-gray-800 dark:text-gray-200 hover:underline">
              Users
            </a>
          </nav>
        </aside>
      <?php endif; ?>