<?php
session_start();


if (isset($_SESSION['user']) != true) {
  header("location:login.php");
  print_r($_SESSION);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <title>Portfolio</title>
</head>

<body>
  <div class="container">
    <a href="index.php">Inicio</a>
    <a href="portfolio.php">Portafolio</a>
    <?php if (isset($_SESSION['user']) != true) { ?>
      <a href="logIn.php">Iniciar sesion</a>
    <?php } else { ?>
      <a href="logOut.php">Cerrar sesion</a>
    <?php } ?>
    <br>