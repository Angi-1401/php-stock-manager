<?php
require_once dirname(__DIR__, 3) . '/src/constants.php';
require_once ROOT_PATH . '/src/controllers/AuthController.php';

if (!isset($_SESSION['user'])) {
  header('Location: ' . PAGES_URL . '/403.php');
  exit;
}

$auth = new AuthController();
$auth->signout();
