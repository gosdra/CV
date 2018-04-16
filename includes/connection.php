<?php
try {
$pdo = new PDO('mysql:host=localhost:3306;dbname=mycv', 'root', 'root');
} catch (PDOException $e) {
  exit('Database error.');
}
?>
