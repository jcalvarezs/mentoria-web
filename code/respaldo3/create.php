<?php

// PDO
require "util/db.php";

$valido =0;

if (isset($_POST["crear"])){

	$db = connectDB();

	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$pass = $_POST["pass"];
	$password = password_hash($pass, PASSWORD_DEFAULT);

$sql ="INSERT INTO users
			(full_name, email, user_name, password)
		VALUES
			(:full_name, :email, :user_name, :password)";

$stmt = $db->prepare($sql);

    $stmt->bindParam(':full_name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':user_name', $username);
    $stmt->bindParam(':password', $password);
                               
    $stmt->execute();

	$message= "Registro almacenado";
	$valido =1;

    header("location: index.php");
}




?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <title>List of User</title>
   
  </head>
  <body class="d-flex flex-column h-100">
    
    <div class="container pt-4 pb-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <a class="navbar-brand" href="#">HTML CRUD Template</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarsExample09">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="create.php">Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://pisyek.com/contact">Help</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-md-0">
                <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </nav>
    </div>
        
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1>Create New User</h1>
            <form action="create.php" method="POST">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" name = "name" placeholder="Ingrese Nombre">
                    <small class="form-text text-muted">Ingrese Nombre usuario Aqui.</small>
                </div>
                <div class="form-group">
                    <label for="name">Nombre Usuario</label>
                    <input type="text" class="form-control" id="email" name = "username"  placeholder="Ingrese Nombre Usuario">
                    <small class="form-text text-muted">Ingrese Nombre Usuario Aqui.</small>
                </div>
                <div class="form-group">
                    <label for="name">Correo</label>
                    <input type="text" class="form-control" id="username" name = "email"  placeholder="Ingrese Correo">
                    <small class="form-text text-muted">Ingrese Correo Aqui.</small>
                </div>
                <div class="form-group">
                <label for="name">Password</label>
                <input type="text" class="form-control" id="pass" name = "pass"  placeholder="IngresePassword">
                <small class="form-text text-muted">ingrese password Aqui.</small>
            </div>
                <button type="submit" class="btn btn-primary"name = "crear">Crear</button>
            </form>
        </div>
    </main>
      
    <footer class="footer mt-auto py-3">
        <div class="container pb-5">
            <hr>
            <span class="text-muted">
                    Copyright &copy; 2019 | <a href="https://pisyek.com">Pisyek.com</a>
            </span>
        </div>
    </footer>

    
    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>