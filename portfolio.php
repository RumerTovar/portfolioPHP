<?php include("header.php");
?>

<?php include("dbFunction.php");
$proyects = dbConection("SELECT * FROM proyectos");

if ($_POST) {
  //print_r($_FILES);

  $name = $_POST["name"];
  $description = $_POST["description"];
  //traemos la fecha para que ninguna imagen se llame igual
  //asi nos evitamos el problema de nombres repetidos
  $date = new DateTime();

  $imageName = $date->getTimestamp() . "_" . $_FILES["image"]["name"];

  $image_temp = $_FILES["image"]["tmp_name"];
  move_uploaded_file($image_temp, "images/" . $imageName);

  dbConection("INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES(null, '$name' , '$imageName', '$description');");

  header("location:portfolio.php");
}
$proyects = dbConection("SELECT * FROM proyectos");

if ($_GET) {

  $id = $_GET["delete"];

  $imageName = dbConection("SELECT imagen FROM `proyectos` WHERE id=" . $id);

  unlink("images/" . $imageName[0]['imagen']);

  dbConection("DELETE FROM `proyectos` WHERE `id` = $id");

  $proyects = dbConection("SELECT * FROM proyectos");

  header("location:portfolio.php");
}


?>


<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Datos del proyecto</div>
        <div class="card-body">
          <form action="portfolio.php" method="post" enctype="multipart/form-data">
            Nombre del proyecto:
            <input require class="form-control" type="text" name="name" id="" /><br />
            Imagen del proyecto:
            <input required class="form-control" type="file" name="image" id="" /><br />
            Descripcion:
            <textarea required class="form-control" name="description" id="" rows="3"></textarea>
            <input class="btn btn-success" type="submit" value="Enviar proyecto" />
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="table-responsive">
        <?php if (empty($proyects)) { ?>
          <h3>No tienes contenido aún.</h3>
        <?php } else { ?>
          <table class="table table-primary">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Imagen</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Accion</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($proyects as $proyect) { ?>
                <tr class="">
                  <td><?php echo $proyect['nombre']; ?></td>
                  <td><img width="100" src="images/<?php echo $proyect['imagen']; ?>" alt=""></td>
                  <td><?php echo $proyect['descripcion']; ?></td>
                  <td><a class="btn btn-danger" href="?delete=<?php echo $proyect['id']; ?>">Eliminar </a></td>
                </tr>
              <?php } ?>
            </tbody>
          <?php } ?>
          </table>
      </div>
    </div>
  </div>
</div>




<?php include("footer.php"); ?>