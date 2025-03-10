<?php
require_once __DIR__ . '/../src/controllers/AuthController.php';

if (isset($_SESSION['user'])) {
  header('Location: ' . BASE_URL . '/403-internal.php');
  exit;
}

$auth = new AuthController();
$auth->signup();
