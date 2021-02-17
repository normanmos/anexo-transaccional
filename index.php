<?php session_start();  include("include/head.php"); include('basedatos.php'); 
if(isset($conn))
 echo "Todo bien en la conexion";
else
echo "Error de conexion";
 ?>

<div class="container p-4">
    <div class="row" > 
        <div class="col-md-4">
            <?php if(isset($_SESSION["mensaje"]))  {?>        
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php echo $_SESSION["mensaje"]; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php session_unset(); }?>

            <div class="card card-body">
                <form action="guardar.php" method="POST">
                   <div class="form-group">
                        <input type="text" name="titulo" class="form-control" placeholder="Titulo">
                   </div> 
                   <div class="form-group"> 
                        <textarea name="descripcion" class="form-control" placeholder="Descripcion"></textarea>
                   </div>     
                    <input type="submit" name="guardar" class="btn btn-success btn-block">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th>Acccion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query="SELECT * FROM AGENDA";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td> <?php echo $row['titulo']   ?> </td>
                            <td> <?php echo $row['descripcion']   ?> </td>
                            <td> <?php echo $row['fecha_creacion']   ?> </td>
                            <td> 
                                <ul style="list-style-type: none">                                
                                    <li>
                                        <a href="update.php?id=<?php echo $row['id']?>" >
                                            Editar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="eliminar.php?id=<?php echo $row['id']?>" >
                                            Eliminar
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>     
                    <?php } ?>                 
                </tbody>
            </table>   
        </div>
    </div>
</div>
    
<?php include("include/footer.php"); ?>