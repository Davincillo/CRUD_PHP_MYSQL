<?php
    include("db.php");
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $consulta = "SELECT * FROM tareas WHERE id = $id";
        $resultado = mysqli_query($conexion, $consulta );
        if (mysqli_num_rows($resultado) == 1) {
            $row = mysqli_fetch_array($resultado);
            $titulo = $row['titulo'];
            $descripcion = $row['descripcion'];
        }
    }
    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $titulo =$_POST['Titulo'];
        $descripcion = $_POST['Descripcion'];
        $consulta = "UPDATE tareas SET titulo='$titulo', descripcion='$descripcion' WHERE id = $id";
        mysqli_query($conexion,$consulta);
        $_SESSION['mensaje'] = 'Su tarea se ha actualizado con éxito';
        $_SESSION['tipo'] = 'warning';
        header('Location: index.php');
        
    }
?>
<?php include("includes/cabezera.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="actualizar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form group">
                        <input type="text" name = titulo value="<?php echo $titulo; ?>"
                        class="form-control">
                    </div>
                    <div class="form group">
                        <textarea name="descripcion" rows="2" value="<?php echo $descripcion; ?>"
                        class="form-control">
                        </textarea>   
                    </div>
                        <button class="btn btn-success" name="actualizar">
                        Actualizar
                        </button>
                </form>    
            </div>    
        </div>
    </div>
</div>
<?php include("includes/piedepagina.php"); ?>