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
$url = $_SERVER['REQUEST_URI'];

?>
    <html lang="en">

    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/import.css">
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
            <a class="<?php echo strpos($url, 'import.php') !== false ? 'active' : '';?>" href="import.php">Import</a>
            </nav>
        <div class="container col-md-3 border box-shadow">
            <div class="row">
                <form method="POST" action="import_process.php" enctype="multipart/form-data">
                    <div class="card-body">
                        <div id="title" class="form-group">
                            <p>Import</p>
                        </div>
                        <div class="form-group">
                            <p>
                                <input type="text" name="name" maxlength="30" class="form-control" placeholder="Name" required>
                            </p>
                            <p>
                                <input type="number" name="hp" value="" class="form-control" placeholder="HP" required>
                            </p>
                            <p>
                                <input type="number" name="number" value="" class="form-control" placeholder="Pokémon Number" required>
                            </p>
                            <p>Description
                                <textarea name="desc" rows="5" class="form-control" placeholder="Type here description of a pokémon" required></textarea>
                            </p>
                            <p>
                                <input type="text" name="ability" maxlength="30" class="form-control" placeholder="Ability" required>
                            </p>
                            <p>
                                <input type="file" class="form-control-file" name="img" id="img" placeholder="Choose a picture" aria-describedby="fileHelpId"
                                    required>
                            </p>
                            <p>
                                <select name="type1" class="form-control">
                                    <option value="">First Type</option>
                                    <?php
                                    $result = $conn->prepare("SELECT types.id,types.type
                                    FROM types");
                                    $result->bind_result($id, $type);
                                    $result->execute();
                                    while ($result->fetch()) {
                                         echo "<option value='$id'>$type</option>\n";
                                     }
                                    $result->close();
        
                                 ?>
                                </select>
                            </p>
                            <p>
                                <select name="type2" class="form-control">
                                    <option value="">Second Type</option>
                                    <?php
                                    $result = $conn->prepare("SELECT types.id,types.type
                                    FROM types");
                                    $result->bind_result($id, $type);
                                    $result->execute();
                                    while ($result->fetch()) {
                                        echo "<option value='$id'>$type</option>\n";
                                    }
                                    $result->close();
                                ?>
                                </select>
                            </p>
                            <div class="form-group row">
                                <input class="btn btn-outline-light my-2 my-sm-0" id="button" type="submit" value="Import" name="submit">
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