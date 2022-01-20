<?php
session_start();
define("USER", "root");
define("PASSWORD", "11bbCC!!");
define("HOST", "localhost");
define("DATABASE", "cilag_tasks");
try {
     $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
     exit("Error: " . $e->getMessage());
}

?>