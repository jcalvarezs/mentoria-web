<?php

$dbname = "registro"; //modicair por valor no valido y comprobar try
$dbuser = "registro-user";
$dbpassword = "registro-user1";

try {$dsn = "mysql:host=localhost;dbname=$dbname";

    //objeto de conexion a la bd
    $db = new PDO($dsn, $dbuser, $dbpassword);
}catch(PDOException $e){
    echo $e->getMessage();

}
 
  /* 
// Preparar la INSERT
$sql ="INSERT INTO users
(full_name, email, user_name, password)
VALUES
(:full_name, :email, :user_name, :password)";

// stament
$stmt = $db->prepare($sql);

$full_name = 'juan perez';
$email = 'juan perez@segic.usach.cl4';
$user_name = "juan perez";
$password = password_hash("juan perez1", PASSWORD_DEFAULT);

$stmt->bindParam(':full_name', $full_name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':user_name', $user_name);
$stmt->bindParam(':password', $password);

$stmt->execute();
*/
// Preparar la DELETE
$id = 2;
$sql ="DELETE FROM users
WHERE id = :id";

// stament
$stmt = $db->prepare($sql);
// no se pueden pasar valores directos, solo referencias
$stmt->bindParam(':id', $id);
$stmt->execute();