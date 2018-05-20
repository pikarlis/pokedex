<?php
include "config.php";
$verificationUser = 'u';
$verificationAdmin = 'a';

if (empty($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['username'])) {
  echo "not working";
  header("Location: home.php");
  exit;
}

$id = $_GET['id'];

$select = $conn->prepare("SELECT pokemon.id, pokemon.name, pokemon.hp, pokemon.number, pokemon.description, pokemon.ability, pokemon.img
FROM pokemon
WHERE pokemon.id = ?");
$select -> bind_param('i',$_GET['id']);
$select->bind_result($id,$name, $hp,$number,$desc,$ability, $img);
$select->execute();
$select->fetch();
$select->close();


$types = array();
$query ="SELECT types.type
FROM pokemon
JOIN pokemonxtype ON pokemon.id = pokemonxtype.pokemon_id
JOIN types ON pokemonxtype.pokemon_type = types.id
WHERE pokemon.id = {$_GET['id']}";
$result = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($result)) {
    array_push($types,$row['type']);
}

$url = $_SERVER['REQUEST_URI'];



?>

    <!doctype html>
    <html lang="en">

    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/select.css">
        <link rel="stylesheet" type="text/css" href="css/hover-min.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
    </head>

    <body>
        <div id="particles-js"></div>
        <nav>
        <a href="logout.php">Logout</a>
            <a class="<?php echo strpos($url, 'list.php') !== false ? 'active' : '';?>" href="list.php">Pokédex</a>
            <a class="<?php echo strpos($url, 'collection.php') !== false ? 'active' : '';?>" href="collection.php">My collection</a>
            <a class="<?php echo strpos($url, 'list_users.php') !== false ? 'active' : '';?>" href="list_users.php">Users</a>
            </nav>



        <div id="pokemon_desc" class="row box-shadow border">
            <div class="col-md-5">
                <img class="card-img" src='pokemons/<?php echo $img?>'>
            </div>
            <div class="col-md-7 card-body">
                <div class="name col-md-12">
                    <?php echo $name?>
                </div>
                <div class="desc col-md-12">
                    <div class="progress" style="height: 2.5rem">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $hp?>" aria-valuemin="0" aria-valuemax="120"
                            style="width:<?php echo $hp?>%">
                            HP:
                            <?php echo $hp?>
                        </div>
                    </div>
                </div>
                <div class="desc col-md-12">
                    Number:
                    <span>
                        <?php echo "#".$number?>
                    </span>
                </div>
                <div class="desc col-md-12">
                    Ability:
                    <span>
                        <?php echo $ability?>
                    </span>
                </div>
                <div class="desc col-md-12">
                    Types:
                    <span>
                        
                        <?php 
                        $index = 0;
                        foreach ($types as $value) {
                        $typesArray[$index] = $value;
                        $index++;
                    }
                    if ($index != 1) {
                        echo $typesArray[0].", ".$typesArray[1];
                    } else {
                        echo $typesArray[0] ;
                    }
                    ?>
                    
                    </span>
                </div>
                <div class="desc col-md-12">
                    Description:
                    <span id="description">
                        <?php echo $desc?>
                    </span>
                </div>
                <div class="desc col-md-12">
                    <div class="btn-group">
                        <?php if ($verificationAdmin == $_SESSION['usertype']) {
                                    echo "<a href='edit.php?id=$id'>
                                    <button type='button' class='btn btn-lg btn-outline-primary hvr-hang'>Edit</button>
                                </a>
                                <a href = 'delete.php?id=$id'>
                                    <button type='button' class='btn btn-lg btn-outline-danger hvr-buzz-out'>Delete</button>
                                </a>";}?>
                        <?php 
                        $userS = $conn->prepare("SELECT users.id FROM users WHERE users.name=?");
                        $userS -> bind_param("s",$_SESSION['username']);
                        $userS -> bind_result($userID);
                        $userS -> execute();
                        $userS -> fetch();
                        $userS -> close();


                        $types_all = array();
                        $query_all ="SELECT usersxpokemon.id_user, usersxpokemon.id_pokemon FROM usersxpokemon WHERE usersxpokemon.id_user = {$userID} AND usersxpokemon.id_pokemon = {$id}";
                        $result = mysqli_query($conn,$query_all);
                        $rowcount=mysqli_num_rows($result);
                        if ($rowcount == 0) {
                            echo "
                            <a href='collection_process.php?id=$id'>
                            <button type='button' class='btn btn-lg btn-outline-success hvr-bob'>Add</button>
                            </a>
                            ";
                        }else {
                            echo "
                            <a href='delete_collection.php?id=$id'>
                            <button type='button' class='btn btn-lg btn-outline-warning hvr-bob'>Delete form collection</button>
                            </a>
                            ";
                        }

                        ?>
                    </div>
                </div>
            </div>
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