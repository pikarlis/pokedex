<?php
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

$select = $conn->prepare("SELECT pokemon.name, pokemon.hp, pokemon.number, pokemon.description, pokemon.ability, pokemon.img
FROM pokemon
WHERE pokemon.id = ?");
$select -> bind_param('i',$_GET['id']);
$select->bind_result($THISname, $THIShp,$THISnumber,$THISdesc,$THISability, $THISimg);
$select->execute();
$select -> fetch();
$select->close();

$typesID = array();
$types = array();
$query ="SELECT types.id, types.type
FROM pokemon
JOIN pokemonxtype ON pokemon.id = pokemonxtype.pokemon_id
JOIN types ON pokemonxtype.pokemon_type = types.id
WHERE pokemon.id = {$_GET['id']}";
$result1 = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($result1)) {
    array_push($types,$row['type']);
    array_push($typesID,$row['id']);
}

$typesID_all = array();
$types_all = array();
$query_all ="SELECT types.id, types.type
FROM types";
$result = mysqli_query($conn,$query_all);
while ($row = mysqli_fetch_assoc($result)) {
    array_push($types_all,$row['type']);
    array_push($typesID_all,$row['id']);
}

$url = $_SERVER['REQUEST_URI'];


?>
    <html lang="en">

    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/edit.css">
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
            <a class="<?php echo strpos($url, 'edit.php') !== false ? 'active' : '';?>" href="edit.php">Edit</a>
            </nav>

        <div class="container col-md-3 border box-shadow">
            <div class="row">
                <form method="POST" action="edit_process.php?id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
                    <div class="card-body">
                        <div id="title" class="form-group">
                            <p>Edit</p>
                        </div>
                        <div class="form-group">
                            <p>
                                <input type="text" name="name" maxlength="30" class="form-control" placeholder="Name" value="<?php echo $THISname?>" required>
                            </p>
                            <p>
                                <input type="number" name="hp" class="form-control" value="<?php echo $THIShp?>" required>
                            </p>
                            <p>
                                <input type="number" name="number" class="form-control" value="<?php echo ltrim($THISnumber,'#')?>" required>
                            </p>
                            <p>Description
                                <textarea name="desc" rows="5" class="form-control" placeholder="Type here description of a pokémon" required><?php echo $THISdesc ?></textarea>
                            </p>
                            <p>
                                <input type="text" name="ability" maxlength="30" class="form-control" placeholder="Ability" value="<?php echo $THISability ?>"
                                    required>
                            </p>
                            <p>
                                <input type="file" class="form-control-file" name="img" id="img" placeholder="Choose a picture" aria-describedby="fileHelpId">
                            </p>
                            <p>
                                <select name="type1" class="form-control">

                                    <?php
                                    $result = $conn->prepare("SELECT types.id,types.type
                                    FROM types");
                                    $result->bind_result($id, $thistype);
                                    $result->execute();
                                    $count = 0;
                                    
                                    foreach ($types_all as $type) {
                                        if ($type == $types[0]) {
                                            echo "<option value=$typesID_all[$count] selected>$type</option>";
                                            $count++;
                                        }else {
                                            echo "<option value=$typesID_all[$count]>$type</option>";
                                            $count++;
                                        } 
                                    }
                                    $result->close();
                                 ?>
                                </select>
                            </p>
                            <p>
                                <select name="type2" class="form-control">
                                    <option value="">&nbsp</option>
                                    <?php
                                    $result = $conn->prepare("SELECT types.id,types.type
                                    FROM types");
                                    $result->bind_result($id, $thistype);
                                    $result->execute();
                                    $count = 0;
                                    foreach ($types_all as $type) {
                                        if ($type == $types[1]) {
                                            echo "<option value=$typesID_all[$count] selected>$type</option>";
                                            $count++;
                                        }else {
                                            echo "<option value=$typesID_all[$count]>$type</option>";
                                            $count++;
                                        } 
                                    }
                                    $result->close();
                                 ?>
                                </select>
                            </p>
                            <div class="form-group row">
                                <input class="btn btn-outline-light my-2 my-sm-0" id="button" type="submit" value="Edit" name="submit">
                            </div>
                        </div>
                    </div>
                </form>
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