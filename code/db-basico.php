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

//preparar consulta
$sql = "INSERT INTO users
        (full_name, email, user_name, password)
        VALUES
        (:full_name, :email, :user_name, :password);";

//statement
$stmt = $db->prepare($sql);

$full_name = 'Juan PErez';
$email = 'juan.perez@segic.usach.cl';
$user_name = 'juan.perez';
$password = 'juan123';

$stmt->bindParam(':full_name',$full_name);
$stmt->bindParam(':email',$email);
$stmt->bindParam(':user_name',$user_name);
$stmt->bindParam(':password',$password);

$stmt->execute();
/*
$id=3;
$stmt = $db->prepare("DELETE FROM users where id=:id");
$stmt->bindParam(':id',$id);
$stmt->execute(); */