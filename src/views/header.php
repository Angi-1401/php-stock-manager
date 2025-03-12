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
</head>

<body>
  <?php if (isset($_SESSION['user'])) : ?>
    <header>
      <nav>
        <a href="<?= PAGES_URL; ?>/auth/profile.php">Profile</a>
        <a href="<?= PAGES_URL; ?>/auth/signout.php">Logout</a>
      </nav>
    </header>
  <?php endif; ?>
  <main>
    <?php if (isset($_SESSION['user'])) : ?>
      <aside>
        <nav>
          <a href="<?= PAGES_URL; ?>/dashboard.php">Dashboard</a>
          <a href="<?= PAGES_URL; ?>/stocks/stocks.php">Stocks</a>
          <a href="<?= PAGES_URL; ?>/users/users.php">Users</a>
        </nav>
      </aside>
    <?php endif; ?>