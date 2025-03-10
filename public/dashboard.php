<?php
require_once __DIR__ . '/../src/constants.php';

session_start();

if (!isset($_SESSION['user'])) {
  header('Location: ' . BASE_URL . '/403.php');
  exit;
}
?>

<?php include __DIR__ . '/../src/views/partials/header.php' ?>

<header>
  <nav>
    <a href="./profile.php">Profile</a>
    <a href="./signout.php">Logout</a>
  </nav>
</header>
<main>
  <aside>
    <nav>
      <a href="./dashboard.php">Dashboard</a>
      <a href="./stocks.php">Stocks</a>
      <a href="./users.php">Users</a>
    </nav>
  </aside>
  <section>
    <h1>Dashboard</h1>
    <p>Welcome, <?= $_SESSION['user']; ?>!</p>
  </section>
</main>
<footer></footer>

<?php include __DIR__ . '/../src/views/partials/footer.php' ?>