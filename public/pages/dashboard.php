<?php
require_once dirname(__DIR__, 2) . '/src/constants.php';
require_once ROOT_PATH . '/src/controllers/AuthController.php';

if (!isset($_SESSION['user'])) {
  header('Location: ' . BASE_URL . '/403.php');
  exit;
}
?>

<?php include ROOT_PATH . '/src/views/header.php' ?>

<section>
  <h1>Dashboard</h1>
  <p>Welcome, <?= $_SESSION['user']; ?>!</p>
</section>

<?php include ROOT_PATH . '/src/views/footer.php' ?>