<?php

//nahrani serveru
include "config.php";

//ulozeni promennych pro overeni ADMIN or USER
$verificationUser = 'u';
$verificationAdmin = 'a';

//osetreni proti vstupu na stranku bez loginu
if (empty($_SESSION)) {
  session_start();
}
if (!isset($_SESSION['username'])) {
  echo "not working";
  header("Location: login.php");
  exit;
}

$url = $_SERVER['REQUEST_URI'];
$url = substr($url, 14);


?>
    <!doctype html>
    <html lang="en">

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
            <a class="<?php echo $url=='list.php' ? 'active' : '';?>" href="list.php">Pokédex</a>
            <a class="<?php echo $url=='collection.php' ? 'active' : '';?>" href="collection.php">My collection</a>
            <a class="<?php echo $url=='list_users.php' ? 'active' : '';?>" href="list_users.php">Users</a>
        </nav>
        <div class="container">
            <div class="row">
                <?php 
                            $select = $conn->prepare("SELECT users.name, users.id FROM users");
                            $select->bind_result($name,$id);
                            $select->execute();

                            while($select->fetch()) {
                                echo "<div class='col-md-3'>
                                <div class='hvr-grow'>
                                    <div class='card mb-3 box-shadow'>
                                        <img class='card-img-top' src='https://cdn1.iconfinder.com/data/icons/freeline/32/account_friend_human_man_member_person_profile_user_users-512.png' alt='' >
                                            <div class='card-body'>
                                                <div class='card-body-grid'>
                                                    <h4 class='card-title' style='float: left'>$name</h4>

                                                    
                                                </div>
                                            </div>
                                        </div>
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