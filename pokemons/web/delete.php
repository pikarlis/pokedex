<?php
$conn = new mysqli('localhost', 'root', '', 'pokedex');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/*
 also this one
 */

include "config.php";
$verificationUser = 'u';
$verificationAdmin = 'a';

if (empty($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['username']) || $verificationAdmin != ($_SESSION['usertype'])) {
  echo "not working";
  header("Location: list.php");
  exit;
}

    $idPok = $_GET['id'];
    $dotaz = $conn-> prepare("DELETE FROM pokemon WHERE id=$idPok");
    if ($dotaz -> execute()) {
      echo "Data byla vlozena";
    }else {
      echo "Data nebyla vlozena";
    }
    $dotaz -> close();

    $idPok = $_GET['id'];
    $selTYPE = $conn-> prepare("DELETE FROM pokemonxtype where pokemon_id=$idPok");
    if ($selTYPE -> execute()) {
      echo "Data byla vlozena";
    }else {
      echo "Data nebyla vlozena";
    }
    $selTYPE -> close();
    header("Location: list.php");
    exit;
?>
  