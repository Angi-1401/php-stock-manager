<?php
require_once __DIR__ . '/../src/controllers/AuthController.php';
require_once __DIR__ . '/../src/controllers/UserController.php';

if (!isset($_SESSION['user'])) {
  header('Location: ' . BASE_URL . '/403.php');
  exit;
}

$auth = new AuthController();

if (!$auth->isAdmin($_SESSION['id'])) {
  header('Location: ' . BASE_URL . '/403.internal.php');
  exit;
}

$user = new UserController();
$user->createUser();
