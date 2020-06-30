<!-- Guardar tareas  -->
<?php

include('db.php');

if (isset($_POST['guardar'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    
    $consulta = "INSERT INTO tareas(titulo,descripcion) VALUES ('$titulo','$descripcion')";
    $result = mysqli_query($conexion, $consulta);
    if (!$result) { 
        die('Lo sentimos, su tarea no se ha guardado');
    }

    $_SESSION['mensaje'] = 'Su tarea se ha guardado con éxito';
    $_SESSION['tipo'] = 'success';

    header('Location: index.php'); // Redirecionamos a index, con una peticion http.
}
?>