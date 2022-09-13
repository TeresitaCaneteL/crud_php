<?php include 'templates/header.php' ?>
<?php
  include_once 'model/conexion.php';
  $sentencia = $bd -> query("SELECT * FROM persona");
  $persona = $sentencia->fetchAll(PDO::FETCH_OBJ);

?>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-7">
      <!-- Alertas -->
      <?php
          if(isset($_GET['mensaje']) and $_GET['mensaje']=='falta'){

      ?>
        <div class="alert alert-danger alert-dismissible fade show"  role="alert">
          <strong>Error!</strong>  Debe completar todos los campos.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
         }
        ?>
      <!-- Alertas -->
      <?php
          if(isset($_GET['mensaje']) and $_GET['mensaje']=='registrado'){

      ?>
        <div class="alert alert-success alert-dismissible fade show"  role="alert">
          <strong>Excelente!</strong>  Registro exitoso.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
         }
        ?>

        <!-- Alertas -->
      <?php
          if(isset($_GET['mensaje']) and $_GET['mensaje']=='error'){

      ?>
        <div class="alert alert-danger alert-dismissible fade show"  role="alert">
          <strong>Error!</strong>  No Existe.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
         }
        ?>

          <!-- Alertas -->
      <?php
          if(isset($_GET['mensaje']) and $_GET['mensaje']=='editado'){
      ?>
        <div class="alert alert-success alert-dismissible fade show"  role="alert">
          <strong>Excelente!</strong>  Datos editados correctamente.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
         }
        ?>

          <!-- Alertas -->
      <?php
          if(isset($_GET['mensaje']) and $_GET['mensaje']=='eliminado'){
      ?>
        <div class="alert alert-warning alert-dismissible fade show"  role="alert">
          <strong>Datos borrados exitosamente.</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
         }
        ?>
       <!--fin-Alertas -->

      <div class="card">
        <div class="card-header">
          lista de personas
        </div>

        <div class="p-4">
         <div class="table-responsive align-middle">
          <table class="table table-primary">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Edad</th>
                <th scope="col">Signo</th>
                <th scope="col" colspan="2">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                  foreach ($persona as $dato){
              ?>
              <tr class="">
                <td scope="row"><?php echo $dato->codigo;?></td>
                <td><?php echo $dato->nombre;?></td>
                <td><?php echo $dato->edad;?></td>
                <td><?php echo $dato->signo;?></td>
                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo;?>"><i class="bi bi-pencil-square"></i></a></td>
                <td><a onclick="return confirm('Estas seguro de eliminar?')" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo;?>"><i class="bi bi-trash"></i></a></td>

              </tr>
              <?php
                  }
              ?>
            </tbody>
          </table>
         </div>

        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card">
        <div class="card-header">
          Ingresar datos:
        </div>
        <form class="p-4" method="POST" action="registrar.php">
           <div class="mb-3">
            <label class="form-label">Nombre:  </label>
              <input type="text" class="form-control" name="txtNombre" autofocus required>
           </div>

           <div class="mb-3">
            <label class="form-label">Edad:</label>
              <input type="text" class="form-control" name="txtEdad" autofocus required>
           </div>

           <div class="mb-3">
            <label class="form-label">Signo:</label>
              <input type="text" class="form-control" name="txtSigno" autofocus required>
           </div>

        <di class="d-grid">
          <input type="hidden" name="oculto" value="1">
          <input type="submit" class="btn btn-primary" value="Registrar">
        </di>
        </form>

      </div>
    </div>
  </div>
</div>

<?php include 'templates/footer.php' ?>