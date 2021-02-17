<?php
session_start();
include('basedatos.php');
$titulo="";
$descripcion="";

if(isset($_GET["id"]))
{
    $id=$_GET["id"];
    $query = "SELECT * FROM agenda WHERE id=$id";
    $result= mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        $titulo=$row['titulo'];
        //echo $titulo;
        $descripcion = $row['descripcion'];
        //echo $descripcion;
    }
}
if(isset($_POST["actualizar"]))
{
    $id = $_GET["id"];
    $titulo=$_POST["titulo"];
    $descripcion=$_POST["descripcion"];
    $query= "UPDATE agenda SET titulo='$titulo' , descripcion='$descripcion' WHERE id=$id";
    $result= mysqli_query($conn,$query);
    if($result)
    {
        $_SESSION["mensaje"]="Exito al actualizar entrada";
        header("Location:index.php");
    }
}


include("include/head.php");
?>

<div class="card card-body">
<form action="update.php?id=<?php echo $id?>" method="POST">
   <div class="form-group">
        <input type="text" name="titulo" class="form-control"   placeholder="Actualizar titulo" value="<?php echo $titulo?>">
   </div> 
   <div class="form-group"> 
        <textarea name="descripcion" class="form-control" placeholder="Actualizar descripcion"><?php echo $descripcion?></textarea>
   </div>     
        <input type="submit" name="actualizar" value="Actualizar"class="btn btn-success btn-block">
</form>
</div>

<?php
include("include/footer.php");

?>


