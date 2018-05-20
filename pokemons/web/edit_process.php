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
if (!isset($_SESSION['username']) || $verificationAdmin != ($_SESSION['usertype'])) {
  echo "not working";
  header("Location: list.php");
  exit;
}

if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$_POST["name"]))
  {
      header("location: list.php"); // send to home page
    exit;
  }elseif (preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/',$_POST["hp"])) {
    header("location: list.php"); // send to home page
    exit;
  }elseif (preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/',$_POST["number"])) {
    header("location: list.php"); // send to home page
    exit;
  }elseif (preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/',$_POST["desc"])) {
    header("location: list.php"); // send to home page
    exit;
  }elseif (preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/',$_POST["ability"])) {
    header("location: list.php"); // send to home page
    exit;
  }elseif (preg_match('/[\'^£$%&*()}{@#~?><>|=_+¬-]/',$_FILES['img']['name'])) {
    header("location: list.php"); // send to home page
    exit;
  }

  




$idPok = $_GET['id'];

if (!empty($_FILES['img']['name'])) {
  $target_dir = "D:/wamp64/www/pokemons v5/web/pokemons/";
$target_file = basename($_FILES["img"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
move_uploaded_file($_FILES['img']['tmp_name'],"$target_dir/$target_file");

$dotaz = $conn-> prepare("UPDATE pokemon set pokemon.name = ?,pokemon.hp = ?,pokemon.number = ?,pokemon.description = ?,pokemon.ability = ?,pokemon.img = ? where pokemon.id = ?");
    $dotaz->bind_param("siisssi",$_POST["name"],$_POST["hp"],$_POST["number"],$_POST["desc"],$_POST["ability"],$_FILES['img']['name'], $idPok);
    if ($dotaz -> execute()) {
      echo "Data byla vlozena";
    }else {
      echo "Data nebyla vlozena";
    }
    $dotaz -> close();

    $selTYPE = $conn-> prepare("UPDATE pokemonxtype SET pokemon_id = ?, pokemon_type = ? where pokemon_id = ?");
    $selTYPE->bind_param("iii",$idPok,$_POST["type1"],$idPok);
    if ($selTYPE -> execute()) {
      echo "Data byla vlozena";
    }else {
      echo "Data nebyla vlozena";
    }
    $selTYPE -> close();

    $selTYPE2 = $conn-> prepare("UPDATE pokemonxtype SET pokemon_id = ?, pokemon_type = ? where pokemon_id = ?");
    $selTYPE2->bind_param("iii",$idP,$_POST['type2'],$idPok);
    if ($selTYPE2 -> execute()) {
      echo "Data byla vlozena";
    }else {
      echo "Data nebyla vlozena";
    }
    $selTYPE2 -> close();
    
    header("Location: list.php");
    exit;

}else{
  $dotaz = $conn-> prepare("UPDATE pokemon set pokemon.name = ?,pokemon.hp = ?,pokemon.number = ?,pokemon.description = ?,pokemon.ability = ? where pokemon.id = ?");
    $dotaz->bind_param("siissi",$_POST["name"],$_POST["hp"],$_POST["number"],$_POST["desc"],$_POST["ability"], $idPok);
    if ($dotaz -> execute()) {
      echo "Data byla vlozena";
    }else {
      echo "Data nebyla vlozena";
    }
    $dotaz -> close();

  $selDEL = "DELETE FROM pokemonxtype where pokemon_id = {$_GET['id']}";
  $result = mysqli_query($conn,$selDEL);



    $selTYPE = $conn-> prepare("INSERT INTO pokemonxtype  (pokemon_id, pokemon_type) VALUES (?,?)");
    $selTYPE->bind_param("ii",$idPok,$_POST["type1"]);
    if ($selTYPE -> execute()) {
      echo "Data byla vlozena";
    }else {
      echo "Data nebyla vlozena";
    }
    $selTYPE -> close();

    if ($_POST["type2"] == "") {
      header("Location: list.php");
    exit;
    }else{
      $selTYPE = $conn-> prepare("INSERT INTO pokemonxtype  (pokemon_id, pokemon_type) VALUES (?,?)");
      $selTYPE->bind_param("ii",$idPok,$_POST["type2"]);
      if ($selTYPE -> execute()) {
        echo "Data byla vlozena";
      }else {
        echo "Data nebyla vlozena";
      }
      $selTYPE -> close();
    
      header("Location: list.php");
      exit;
    }
    
}




    