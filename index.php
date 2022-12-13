<?php include("header.php");

?>
<?php include("dbFunction.php");
$proyects = dbConection("SELECT * FROM proyectos"); ?>

<div class="p-5 bg-light">
  <div class="container">
    <h1 class="display-3">Bienvenid@s</h1>
    <p class="lead">Este es un portfolio privado </p>
    <hr class="my-2">
    <p>Más informacion</p>
  </div>
</div>
<div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
  <?php foreach ($proyects as $proyect) { ?>
    <div class="col">
      <div class="card h-100">
        <img src="images/<?php echo $proyect['imagen']; ?>" alt="">
        <div class="card-body">
          <h5 class="card-title"><?php echo $proyect['nombre']; ?></h5>
          <p class="card-text"><?php echo $proyect['descripcion']; ?></p>
        </div>
      </div>
    </div>
  <?php } ?>
</div>


<?php include("footer.php"); ?>