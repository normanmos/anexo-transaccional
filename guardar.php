<?php
include('basedatos.php');
$titulo=$_POST["titulo"];
$descripcion = $_POST["descripcion"];
$query = "INSERT INTO agenda (titulo, descripcion) VALUES ('$titulo', '$descripcion')";
$result= mysqli_query($conn, $query);
if($result)
{
    //echo "Agenda creada.";
    $_SESSION["mensaje"]= "Exito al crear entrada";
    header("Location:index.php");
}
else
    echo "Error al crear entrada";

?>