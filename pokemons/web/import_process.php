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
  }elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$_POST["hp"])) {
    header("location: list.php"); // send to home page
    exit;
  }elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$_POST["number"])) {
    header("location: list.php"); // send to home page
    exit;
  }elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$_POST["desc"])) {
    header("location: list.php"); // send to home page
    exit;
  }elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$_POST["ability"])) {
    header("location: list.php"); // send to home page
    exit;
  }elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/',$_FILES['img']['name'])) {
    header("location: list.php"); // send to home page
    exit;
  }

        //cesta pro ulozeni obrazku
  $target_dir = "D:/wamp64/www/pokemons v9/web/pokemons/";
  $target_file = basename($_FILES["img"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  move_uploaded_file($_FILES['img']['tmp_name'],"$target_dir/$target_file");


    $dotaz = $conn-> prepare("INSERT INTO pokemon (pokemon.name,pokemon.hp,pokemon.number,pokemon.description,pokemon.ability,pokemon.img) VALUES (?,?,?,?,?,?)");
    $dotaz->bind_param("siisss",$_POST["name"],$_POST["hp"],$_POST["number"],$_POST["desc"],$_POST["ability"],$_FILES['img']['name']);
    if ($dotaz -> execute()) {
      echo "Data byla vlozena";
    }else {
      echo "Data nebyla vlozena";
    }
    $dotaz -> close();

    $selID = $conn-> prepare("SELECT pokemon.id FROM pokemon ORDER BY id DESC LIMIT 0, 1");
    $selID->bind_result($idP);
    $selID -> execute();
    $selID ->fetch();
    $selID -> close();

    $selTYPE = $conn-> prepare("INSERT INTO pokemonxtype (pokemon_id, pokemon_type) VALUES (?, ?)");
    $selTYPE->bind_param("ii",$idP,$_POST["type1"]);
    if ($selTYPE -> execute()) {
      echo "Data byla vlozena";
    }else {
      echo "Data nebyla vlozena";
    }
    $selTYPE -> close();

    $selTYPE2 = $conn-> prepare("INSERT INTO pokemonxtype (pokemon_id, pokemon_type) VALUES (?, ?)");
    $selTYPE2->bind_param("ii",$idP,$_POST['type2']);
    if ($selTYPE2 -> execute()) {
      echo "Data byla vlozena";
    }else {
      echo "Data nebyla vlozena";
    }
    $selTYPE2 -> close();
  
    header("Location: list.php");
    exit;