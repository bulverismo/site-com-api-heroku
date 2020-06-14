<?php
$servername = "localhost";
$username = "root";
$password = "curicalinda";

try {
  $conn = new PDO("mysql:host=$servername;dbname=hellcode", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

// fechando a conexção
$conn = null;


