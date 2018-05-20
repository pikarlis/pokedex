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

$url = $_SERVER['REQUEST_URI'];


?>
    <html lang="en">

    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/collection.css">
        <link rel="stylesheet" type="text/css" href="css/hover-min.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
        <script src="scripts.js "></script>

    </head>

    <body id="telo">
        <div id="particles-js"></div>
        <nav>
            <a href="logout.php">Logout</a>
                <a class="<?php echo strpos($url, 'list.php') !== false ? 'active' : '';?>" href="list.php">Pokédex</a>
                <a class="<?php echo strpos($url, 'collection.php') !== false ? 'active' : '';?>" href="collection.php">My collection</a>
                <a class="<?php echo strpos($url, 'list_users.php') !== false ? 'active' : '';?>" href="list_users.php">Users</a>
                </nav>
        
        <div class="container">
            <div class="row">
                <?php 
    $select = $conn->prepare("SELECT pokemon.id, pokemon.name, pokemon.img from users JOIN usersxpokemon ON users.id = usersxpokemon.id_user JOIN pokemon ON usersxpokemon.id_pokemon = pokemon.id WHERE users.name = '$username'");
    $select -> bind_result($id,$name,$img);
    $select -> execute();
    while($select->fetch()) {
        echo "<div class='col-md-3'>
        <div class='hvr-grow'>
        <a href='select.php?id=$id'><div class='card mb-3 box-shadow'>
                <img class='card-img-top' src='pokemons/$img' alt='' >
                    <div class='card-body'>
                        <div class='card-body-grid'>
                            <h4 class='card-title'>$name</h4>
                            <a href='delete_collection.php?id=$id'><button type='button' class='btn btn-outline-Warning hvr-buzz-out'>Delete</button></a>
                        </div>
                    </div>
            </a></div>
        </div>
    </div>";
    }

    $select->close();
    ?>
            </div>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS, then crossfade-->
            <script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js " integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN "
                crossorigin="anonymous "></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q "
                crossorigin="anonymous "></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl "
                crossorigin="anonymous "></script>
            <script src="../scripts.js "></script>
            <script type="text/javascript" src="scripts/particles.js"></script>
            <script type="text/javascript" src="scripts/app.js"></script>
    </body>

    </html>