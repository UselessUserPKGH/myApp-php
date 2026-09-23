<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require __DIR__ . "/../../db/db.php";

if (!$connective) {
    die("Ошибка: " . mysqli_connect_error());
}

echo "ОК";