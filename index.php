<!-- Iniciador de la aplicación -->
<?php include("db.php") ?>
<?php include("includes/cabezera.php") ?>
<div class="container p-4">

   <div class="row">

      <div class="col-md-4">
         <?php if (isset($_SESSION['mensaje'])) { ?>
            <div class="alert alert-<?= $_SESSION['tipo'] ?> alert-dismissible fade show" role="alert">
               <?= $_SESSION['mensaje'] //Mostrar mensaje
               ?>
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
         <?php session_unset();
         } ?>

         <div class="card card-body">

            <form action="guardar.php" method="POST">

               <div class="form-group">

                  <input type="text" name="titulo" class="form-control" placeholder="Título de la tarea" autofocus>

               </div>

               <div class="form-group">
                  <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripción"></textarea>

               </div>
               <input type="submit" class="btn btn-success btn-block" name="guardar" value="guardar tarea">

            </form>

         </div>

      </div>
      <div class="col-md-8">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>Título</th>
                  <th>Descripción</th>
                  <th>Fecha de creación</th>
                  <th>Acciones</th>
               </tr>
            </thead>
            <tbody>
               <?php $query = 'select * from tareas';
               $resultado = mysqli_query($conexion, $query);
               while ($fila = mysqli_fetch_array($resultado)) { ?>
                  <tr>
                     <td><?php echo $fila['titulo'] ?></td>
                     <td><?php echo $fila['descripcion'] ?></td>
                     <td><?php echo $fila['Fecha_creación'] ?></td>
                     <td><a href="actualizar.php?id=<? echo php $row['id'] ?>" class="btn tbn-secondary">
                           <i class="fas fa-marker"></i>
                        </a>
                        <a href="borrar.php?id=<? echo php $row['id'] ?>" class="btn tbn-danger">
                           <i class="far fa-trash-alt"></i>
                        </a>
                     </td>
                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>

</div>

<?php include("includes/piedepagina.php") ?>