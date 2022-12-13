<?php

session_start();


if ($_POST) {
  if ($_POST['user'] == "developer" && ($_POST['password'] == "1234")) {
    echo "Iniciaste session";

    //para establecer la session
    $_SESSION['user'] = true;

    //para redireccionamientos:
    header("location:index.php");
  } else {
    echo "<script> alert('usuario o contraseña incorrecta'); </script>";
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

  <div class="container">

    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <br>
        <div class="card">
          <div class="card-header">
            Iniciar Sesion
          </div>
          <div class="card-body">
            <form action="logIn.php" method="post">
              Usuario: <input class="form-control" type="text" name="user" id=""><br>
              Contraseña: <input class="form-control" type="password" name="password" id=""><br>

              <input class="btn btn-success" type="submit" value="Iniciar sesion">
            </form>
          </div>
          <div class="card-footer text-muted">
            Footer
          </div>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>



</body>

</html>