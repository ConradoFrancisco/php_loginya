<?php
    include('db.php');
    include('includes/header.php');
?>
    
<div class="container">
    <div class="row">
        <div class="col-md-4 p-4">
            <?php
                if(isset($_SESSION['mensaje'])){ ?>
                    <div class="alert alert-<?php echo $_SESSION['tipo'] ?> alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['mensaje']?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
               <?php } session_unset()?>
            <div class="card card-body">
                <form action="addlibro.php" method="POST">
                    <div class="form-group ">
                        <input type="text" class="form-control" name="titulo" placeholder="Titulo" autofocus >
                    </div>
                    <div class="form-group pt-4">
                        <input type="text" class="form-control" name="stock" placeholder="Stock">
                    </div>
                    <div class="form-group pt-4">
                        <textarea name="descripcion" rows="2" placeholder="Descripción" class="form-control"></textarea>
                    </div>
                    
                    <div class="form-group pt-4"><input type="submit" class="btn btn-success btn-block" name="addlibro"></div>
                </form>
            </div>
        </div>
        <div class="col-md-8 p-4">
            <table class="table table-bordered table-rounded">
                    <thead>
                        <tr>
                            <th>titulo</th>
                            <th>Stock</th>
                            <th>descripcion</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT * from libros";
                            $result = mysqli_query($conn,$query);

                            while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                    <td>
                                        <?php  echo $row['titulo'] ?>
                                    </td>
                                    <td>
                                        <?php  echo $row['stock'] ?>
                                    </td>
                                    <td>
                                        <?php  echo $row['descripcion'] ?>
                                    </td>
                                    <td>
                                        <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-primary mx-2" >
                                            <i class="fa-regular fa-pen-to-square  "></i>
                                        </a>
                                        <a href="eliminar.php?id=<?php echo $row['id'] ?> " class="btn btn-danger">
                                            <i class="fa-solid fa-trash "></i>
                                        </a>
                                    </td>
                                </tr>
                                
                           <?php }?>

                        
                    </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
    include('includes/footer.php')
?>
