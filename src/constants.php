<?php
$root = dirname(__DIR__);

if (!defined("BASE_URL")) {
  define("BASE_URL", "/" . basename($root) . "/public");
}

if (!defined("PAGES_URL")) {
  define("PAGES_URL", "/" . basename($root) . "/public/pages");
}

if (!defined("ROOT_PATH")) {
  define("ROOT_PATH", $root);
}
