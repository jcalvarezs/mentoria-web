<?php

session_start();

if (!isset($_SESSION['nombre'])){
    header("location: index.php");
}
echo "bienvenido, $_SESSION['nombre']";

require "util/db.php";
$db = connectDB();
