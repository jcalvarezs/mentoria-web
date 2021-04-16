<?php
function connectDB(){

$dbname = "registro"; //modicair por valor no valido y comprobar try
$dbuser = "registro-user";
$dbpassword = "registro-user1";

try {$dsn = "mysql:host=localhost;dbname=$dbname";

    //objeto de conexion a la bd
    $db = new PDO($dsn, $dbuser, $dbpassword);
}catch(PDOException $e){
    echo $e->getMessage();
}
}