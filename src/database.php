<?php
require_once __DIR__ . '/constants.php';

$env = parse_ini_file(ROOT_PATH . '/.env');

$host = $env['DB_HOST'];
$user = $env['DB_USER'];
$pass = $env['DB_PASS'];
$db_name = 'php_stock_manager';

try {
  // Connect to the database
  $database = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
  $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
  die('Connection failed: ' . $error->getMessage());
}
