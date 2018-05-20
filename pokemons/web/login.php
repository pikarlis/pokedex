<?php
  include "config.php";
  if(empty($_SESSION)) // if the session not yet started
   session_start();


if(isset($_SESSION['username'])) { // if already login
   header("location: list.php"); // send to home page
   exit;
}
$url = $_SERVER['REQUEST_URI'];
$url = substr($url, 14);
?>
    <html lang="en">

    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
    </head>

    <body>
        <div id="particles-js"></div>
        <nav>
            <a class="active" href="login.php">Login</a>
            <a class="" href="register.php">Register</a>
        </nav>

        <div id="login_container" class="container col-md-3 border box-shadow">
            <div class="row">
                <form class="" action="login_proccess.php" method="POST">
                    <div class="card-body">
                        <div id="title" class="form-group ">
                            <p>Pokédex</p>
                        </div>
                        <div class="form-group">
                            <p>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-describedby="helpId" required>
                            </p>
                            <p>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-describedby="helpId"
                                    required>
                            </p>
                            <div class="form-group row">
                                <input class="btn btn-outline-light my-2 my-sm-0" id="button" type="submit" value="Login" name="submit">
                            </div>
                            <p id="register_link" class="col-md-12">New to this site?
                                <a href="register.php" style="color: #6483c2; text-decoration: underline;">Register now!</a>
                            </p>
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