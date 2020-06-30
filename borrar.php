<!-- Borrar tareas  -->
<?php

    include('db.php');

    if (isset($_GET['id'])) {
        $id= $_GET['id'];
        $consultaborrar = "DELETE FROM tareas WHERE id=$id ";
        $result = mysqli_query($conexion, $consultaborrar);
        if (!$result) {  
            die('Lo sentimos, su tarea no pudo borrarse');
        }

        $_SESSION['mensaje'] = 'Su tarea se ha eliminado con éxito';
        $_SESSION['tipo'] = 'danger';
        header("Location: index.php");
    }
?>