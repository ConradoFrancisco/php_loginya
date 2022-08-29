<?php 
session_start();
include("../includes/header.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 mx-auto p-4">
        <?php
            if(isset($_SESSION['mensajes'])){
                for ($i = 0 ; $i < count($_SESSION['mensajes']); $i++) {?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION['mensajes'][$i];?> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php }?>
            <?php session_unset();?>
        <?php } ?>
                    
            <div class="card card-body">
                <h3 class="title">Registro</h3>
                <form action="adduser.php" method="POST">
                    <div class="form-group ">
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre" autofocus >
                    </div>
                    <div class="form-group pt-4">
                        <input type="text" class="form-control" name="apellido" placeholder="Apellido">
                    </div>
                    <div class="form-group pt-4">
                        <input type="password" class="form-control" name="contraseña" placeholder="Contraseña">
                    </div>
                    <div class="form-group pt-4">
                        <input type="password" class="form-control" name="repetir_contraseña" placeholder="Repetir Contraseña">
                    </div>
                    <div class="form-group pt-4"><input type="submit" class="btn btn-success btn-block" name="adduser"></div>
                </form>
            </div>
        </div>
    </div>    
</div>


<?php
include("../includes/footer.php");

?>