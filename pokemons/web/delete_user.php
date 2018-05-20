<?php
$conn = new mysqli('localhost', 'root', '', 'pokedex');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if (!isset($_SESSION['username']) || $verificationAdmin != ($_SESSION['usertype'])) {
  echo "not working";
  header("Location: list.php");
  exit;
}

include "config.php";
$verificationUser = 'u';
$verificationAdmin = 'a';

if (empty($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['username'])) {
  echo "not working";
  header("Location: list.php");
  exit;
}

    $idUser = $_GET['id'];
    $dotaz = $conn-> prepare("DELETE FROM users WHERE id=$idUser");
    if ($dotaz -> execute()) {
      echo "Data byla vlozena";
    }else {
      echo "Data nebyla vlozena";
    }
    $dotaz -> close();

    header("Location: list_users.php");
  exit;
    
?>
  