<?php include __DIR__ . '/../../constants.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Stock Manager</title>
</head>

<body>
  <?php if (isset($_SESSION['user'])) : ?>
    <header>
      <nav>
        <a href="./profile.php">Profile</a>
        <a href="./signout.php">Logout</a>
      </nav>
    </header>
  <?php endif; ?>
  <main>
    <aside>
      <?php if (isset($_SESSION['user'])) : ?>
        <nav>
          <a href="./dashboard.php">Dashboard</a>
          <a href="./stocks.php">Stocks</a>
          <a href="./users.php">Users</a>
        </nav>
      <?php endif; ?>
    </aside>