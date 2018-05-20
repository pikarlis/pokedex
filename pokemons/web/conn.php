<?php
$conn = new mysqli('localhost', 'root', '', 'pokedex');
$conn -> set_charset('utf8');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>