<?php
$env = parse_ini_file(__DIR__ . "/../.env");

$host = $env["DB_HOST"];
$user = $env["DB_USER"];
$pass = $env["DB_PASS"];
$db_name = "php_stock_manager";

try {
  $database = new PDO("mysql:host=$host;dbname=$db_name", $user, $pass);
  $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
  die("Connection failed: " . $error->getMessage());
}
