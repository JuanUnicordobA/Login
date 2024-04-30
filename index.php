<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<title>Bienvenido a tu App</title>  
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/csss/style.css">
</head>

<body>

<?php require'partials/header.php'?>

    <h1>Por favor logueate o registrate </h1>
    <a href="loguin.php">Loguin</a> o
    <a href="registrarse.php">Registrarse</a>

</body>

 



</html>