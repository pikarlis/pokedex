<?php
    include "config.php";
    //my database
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username))
        {
            header("location: register.php"); // send to home page
    	    exit;
        }elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)) {
            header("location: register.php"); // send to home page
    	    exit;
        }

    $bind = $conn->prepare("INSERT INTO users (name, password, usertype) VALUES (?,?,'u')");
    $bind -> bind_param("ss",$username, $password);
    // "sss" means all inputs will be strings

    // Set parameters and execute

    $bind->execute();


    $bind->close();
    $conn->close();

    $url = $_SERVER['REQUEST_URI'];
    $url = substr($url, 14);
?>

    </html>
    <!doctype html>
    <html lang="en">

    <head>
        <title>Pokedex</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/register_proccess.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
            crossorigin="anonymous">
    </head>

    <body id="telo">
        <div id="particles-js"></div>
        <nav>
            <a class="<?php echo $url=='login.php' ? 'active' : '';?>" href="login.php">Login</a>
            <a class="<?php echo $url=='register_proccess.php' ? 'active' : '';?>" href="register.php">Register</a>
        </nav>
        <div id="register_container" class="container col-md-3 border box-shadow">
            <div class="row">
                <form class="" action="register_proccess.php" method="POST">
                    <div class="card-body">
                        <div id="title" class="form-group ">
                            <p>Register</p>
                        </div>
                        <div class="form-group row">
                            <p id="register_link" class="col-md-12">You've been successfully registered
                            </p>
                        </div>
                        <div class="form-group row">
                            <a class="btn btn-outline-light my-2 my-sm-0" id="button" href="login.php">Continue</a>
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