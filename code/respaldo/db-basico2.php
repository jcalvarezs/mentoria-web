<?php

$dbname = "registro";
$dbuser = "registro-user";
$dbpassword = "user1";

try {
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $db = new PDO($dsn, $dbuser, $dbpassword);
    echo "Correcto";

} catch (PDOException $e) {
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

$full_name = 'Raul Marin4';
$email = 'raul.marin@segic.usach.cl4';
$user_name = "raul.marin4";
$password = password_hash("user4", PASSWORD_DEFAULT);

$stmt->bindParam(':full_name', $full_name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':user_name', $user_name);
$stmt->bindParam(':password', $password);

$stmt->execute();

//password_verify("user4", "valor de la bd") //devuelve verdadero si coincide
*/

/*
// Preparar la INSERT Masivo
$users = [
            [
                'name'=>'miguel', 
                'email'=>'miguel.p@usach', 
                'us
