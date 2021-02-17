<?php
session_start();
include('basedatos.php');
$id=$_GET["id"];
$query = "DELETE FROM agenda WHERE id=$id";
$result= mysqli_query($conn, $query);
if(!$result)
{
    die("Error al eliminar");
}
$_SESSION["mensaje"]= "Exito al eliminar entrada";
header("Location:index.php");

?>