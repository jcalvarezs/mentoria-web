<?php

$dbname = "registro"; //modicair por valor no valido y comprobar try
$dbuser = "registro-user";
$dbpassword = "registro-user1";

try {$dsn = "mysql:host=localhost;dbname=$dbname";


    //objeto de conexion a la bd
    $db = new PDO($dsn, $dbuser, $dbpassword);

    echo "coneccion correcta";
}catch(PDOException $e){
    echo $e->getMessage();

}
   
// Preparar la INSERT
$sql ="INSERT INTO users
(full_name, email, user_name, password)
VALUES
(:full_name, :email, :user_name, :password)";

// stament
$stmt = $db->prepare($sql);

$full_name = 'Raul Marin4';
$email = 'raul.marin@segic.usach.cl4';
$user_name = "raul.marin4";
$password = password_hash("user4", PASSWORD_DEFAULT);

$stmt->bindParam(':full_name', $full_name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':user_name', $user_name);
$stmt->bindParam(':password', $password);

$stmt->execute();