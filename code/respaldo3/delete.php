<?php

require "util/db.php";
$db = connectDB();
$id = $_GET['id'];
if (!isset($_POST["Borrar"])){
// Preparar la SELECT

    $sqlSelct ="SELECT id, full_name, user_name, email FROM users WHERE id = :id";

    // stament
    $stmt1 = $db->prepare($sqlSelct);
    $stmt1->bindParam(':id', $id);
    $stmt1->execute();
    $user = $stmt1 -> fetch();
}
else{

    $sql ="DELETE FROM users WHERE id = :id";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);                         
    $stmt->execute();
    header("location:index.php");  
    
    session_start();
    $_SESSION["msg-delete"] = "Registro eliminado correctamente";
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

    <title>Eliminación de Usuarios</title>
   
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
                    <li class="nav-item">
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
            <h1>Eliminación de Usuario</h1>
            <form action="" method="POST" action= "delete.php?id=<?=$id?>">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="<?=$user['full_name'] ?>" placeholder="Enter name" readonly>
                    <small class="form-text text-muted">Help message here.</small>
                </div>
                <div class="form-group">
                    <label for="name">Correo</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?=$user['email'] ?>" placeholder="Enter name" readonly>
                    <small class="form-text text-muted">Help message here.</small>
                </div>
                <div class="form-group">
                    <label for="name">Nombre Usuario</label>
                    <input type="text" class="form-control" id="user_name" name="user_name"value="<?=$user['user_name'] ?>" placeholder="Enter name" readonly>
                    <small class="form-text text-muted">Help message here.</small>
                </div>
                <button type="submit" class="btn btn-primary"name = "Borrar">Borrar</button>
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