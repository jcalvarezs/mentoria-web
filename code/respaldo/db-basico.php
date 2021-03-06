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

// Preparar la DELETE
$id = 6;
$sql ="DELETE FROM users
WHERE id = :id";

// stament
$stmt = $db->prepare($sql);
// no se pueden pasar valores directos, solo referencias
$stmt->bindParam(':id', $id);
$stmt->execute();

// Preparar la INSERT Masivo
$users = [
    [
        'name'=>'miguel', 
        'email'=>'miguel.p@usach', 
        'username'=>'miguel', 
        'password'=>'miguel123'
    ],
    [
        'name'=>'andrea', 
        'email'=>'andrea.a@usach', 
        'username'=>'andrea', 
        'password'=>'andrea123'
    ]
];


$sql ="INSERT INTO users
(full_name, email, user_name, password)
VALUES
(:full_name, :email, :user_name, :password)";

// stament
$stmt = $db->prepare($sql);

foreach ($users as $user){   

$stmt->bindParam(':full_name', $user['name']);
$stmt->bindParam(':email', $user['email']);
$stmt->bindParam(':user_name', $user['username']);
$password = password_hash($user['password'], PASSWORD_DEFAULT);
$stmt->bindParam(':password', $password);
                       
$stmt->execute();
}
*/

// Preparar la SELECT para mostrar 
$sql ="SELECT id, full_name, user_name, email
       FROM users";
// stament
$stmt = $db->prepare($sql);

$stmt->execute();


$users = $stmt -> fetchAll(PDO::FETCH_ASSOC);

echo '<table border="1">
        <tr>
            <th>ID</th>
            <th>NOMBRE COMPLETO</th>
            <th>USUARIO</th>
            <th>CORREO</th>
        </th>';
            
foreach ($users as $user) {
    echo '<tr>
            <th>' .$user['id']. '</th>
            <th>' .$user['full_name']. '</th>
            <th>' .$user['user_name']. '</th>
            <th>' .$user['email']. '</th>
          </th>';
};