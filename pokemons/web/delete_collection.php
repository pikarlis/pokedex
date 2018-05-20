<?php
$conn = new mysqli('localhost', 'root', '', 'pokedex');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
$username=$_SESSION['username'];


$select = $conn->prepare("SELECT id FROM users WHERE name='$username'");
$select -> bind_result($idUser);
$select -> execute();
$select -> fetch();
$select -> close();

    $idPok = $_GET['id'];
    $dotaz = $conn-> prepare("DELETE FROM usersxpokemon WHERE id_user=$idUser and id_pokemon = $idPok");
    if ($dotaz -> execute()) {
      echo "Data byla vlozena";
    }else {
      echo "Data nebyla vlozena";
    }
    $dotaz -> close();

    header("Location: collection.php");
  exit;
    
?>
  