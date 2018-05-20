<?php
include "config.php";
$verificationUser = 'u';
$verificationAdmin = 'a';

if (empty($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['username'])) {
  echo "not working";
  header("Location: login.php");
  exit;
}

$url = $_SERVER['REQUEST_URI'];



?>
    <!doctype html>
    <html lang="en">
    gonna do some stuff
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/list.css">
        <link rel="stylesheet" type="text/css" href="css/hover-min.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
        <script src="scripts.js "></script>

    </head>

    <body>
        <div id="particles-js"></div>

        <nav>
            <a href="logout.php">Logout</a>
            <a class="<?php echo strpos($url, 'list.php') !== false ? 'active' : '';?>" href="list.php">Pokédex</a>
            <a class="<?php echo strpos($url, 'collection.php') !== false ? 'active' : '';?>" href="collection.php">My collection</a>
            <a class="<?php echo strpos($url, 'list_users.php') !== false ? 'active' : '';?>" href="list_users.php">Users</a>
            <form id="search_container" action="list_search" method="POST">
                <input name="search" id="search" placeholder="Name of a pokemon...">
                <button type="submit" id="pokemonSearch" class="">
                    Search
                </button>
            </form>
        </nav>
        <div class="dropdown">
            <button class="dropbtn">Types</button>
            <div class="dropdown-content">
                <a href='list.php?razeni=1' class="hvr-backward">
                    Bug
                </a>
                <a href='list.php?razeni=2' class="hvr-backward">
                    Dark
                </a>
                <a href='list.php?razeni=3' class="hvr-backward">
                    Dragon
                </a>
                <a href='list.php?razeni=4' class="hvr-backward">
                    Electric
                </a>
                <a href='list.php?razeni=5' class="hvr-backward">
                    Fairy
                </a>
                <a href='list.php?razeni=6' class="hvr-backward">
                    Fighting
                </a>
                <a href='list.php?razeni=7' class="hvr-backward">
                    Fire
                </a>
                <a href='list.php?razeni=8' class="hvr-backward">
                    Flying
                </a>
                <a href='list.php?razeni=9' class="hvr-backward">
                    Ghost
                </a>
                <a href='list.php?razeni=10' class="hvr-backward">
                    Grass
                </a>
                <a href='list.php?razeni=11' class="hvr-backward">
                    Ground
                </a>
                <a href='list.php?razeni=12' class="hvr-backward">
                    Ice
                </a>
                <a href='list.php?razeni=13' class="hvr-backward">
                    Normal
                </a>
                <a href='list.php?razeni=14' class="hvr-backward">
                    Posion
                </a>
                <a href='list.php?razeni=15' class="hvr-backward">
                    Psychic
                </a>
                <a href='list.php?razeni=16' class="hvr-backward">
                    Rock
                </a>
                <a href='list.php?razeni=17' class="hvr-backward">
                    Steel
                </a>
                <a href='list.php?razeni=18' class="hvr-backward">
                    Water
                </a>
            </div>
        </div>
        <div class=" container ">
            <div class="row ">
                <?php
        if ($verificationAdmin == $_SESSION['usertype']) {
            echo "<div class='col-md-3'>
                    <div class='hvr-grow'>
                        <a href='import.php'>
                            <div class='card mb-3 box-shadow'>
                                <img class='card-img-top' src='https://cdn3.iconfinder.com/data/icons/glypho-generic-icons/64/plus-big-512.png' alt='Import'>
                                <div class='card-body'>
                                    <div class='card-body-grid'>
                                        <h4 class='card-title' style='float: left'>Create a new pokemon</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
            </div>"; } ?>
                    <?php 
    if (isset($_GET["razeni"])) {
        $razeni = $conn->real_escape_string($_GET["razeni"]);
        $select = $conn->prepare("SELECT pokemon.id, pokemon.img, pokemon.name FROM pokemon JOIN pokemonxtype ON pokemon.id = pokemonxtype.pokemon_id WHERE pokemonxtype.pokemon_type = $razeni");
        $select->bind_result($id,$img,$name);
        $select->execute();
      }else {
        $select = $conn->prepare("SELECT pokemon.id, pokemon.img, pokemon.name FROM pokemon");
        $select->bind_result($id,$img,$name);
        $select->execute();
      }


    while($select->fetch()) {
        echo "<div class='col-md-3'>
        <div class='hvr-grow'>
        <a href='select.php?id=$id'><div class='card mb-3 box-shadow'>
                <img class='card-img-top' src='pokemons/$img' alt='' >
                    <div class='card-body'>
                        <div class='card-body-grid'>
                            <h4 class='card-title' style='float: left'>$name</h4>
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

            <script type="text/javascript" src="scripts/particles.js"></script>
            <script type="text/javascript" src="scripts/app.js"></script>
    </body>

    </html>