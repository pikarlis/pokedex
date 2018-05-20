<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>School project</title>
        <link href="css.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>

        <?php
        session_start();
        unset($_SESSION['username']);
        session_destroy();

header("Location: login.php");
exit;
?>

<script src="../scripts.js "></script>
        <script type="text/javascript" src="scripts/particles.js"></script>
        <script type="text/javascript" src="scripts/app.js"></script>
    </body>
</html>
