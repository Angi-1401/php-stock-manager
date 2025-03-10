<?php
$root = dirname(__DIR__);

if (!defined("BASE_URL")) {
  define("BASE_URL", "/" . basename($root) . "/public");
}
