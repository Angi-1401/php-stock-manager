<?php
require_once __DIR__ . '/../src/constants.php';

session_start();

if (!isset($_SESSION['user'])) {
  header('Location: ' . BASE_URL . '/403.php');
  exit;
}
?>

<?php include __DIR__ . '/../src/views/partials/header.php' ?>

<section>
  <h1>Dashboard</h1>
  <p>Welcome, <?= $_SESSION['user']; ?>!</p>
</section>

<?php include __DIR__ . '/../src/views/partials/footer.php' ?>