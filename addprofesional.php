<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Profesional</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="css/style_nav.css" rel="stylesheet">
    <style>
    .content {
        margin-top: 80px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <?php include("nav.php");?>
    </nav>
    <div class="container">
        <div class="content">
            <h2>Agregar Profesional</h2>
            <hr />

           
            <form class="form-horizontal" action="" method="post">

                <div class="form-group">
                    <label class="col-sm-3 control-label">Nombres</label>
                    <div class="col-sm-4">
                        <input type="text" name="nombres" class="form-control" placeholder="Nombres" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Apellidos</label>
                    <div class="col-sm-4">
                        <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Profesión</label>
                    <div class="col-sm-4">
                        <input type="text" name="profesion" class="form-control" placeholder="Profesión" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Tarjeta Profesional</label>
                    <div class="col-sm-4">
                        <input type="text" name="tarjetaprofesional" class="form-control"
                            placeholder="Tarjeta Profesional" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Empresa</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="idempresa" required>
                            <option value="">Seleccione </option>
                            <?php
							$sql = mysqli_query($con, "SELECT * FROM empresa");
							$row = mysqli_fetch_assoc($sql);
							do {
								echo '
								<option value="' . $row[idempresa] . '">' . $row['razonsocial'] . '</option>
								';
							} while ($row = mysqli_fetch_assoc($sql));
							?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">&nbsp;</label>
                    <div class="col-sm-6">
                        <input type="submit" name="addprofesional" class="btn btn-sm btn-primary" value="Guardar datos">
                        <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
                    </div>
                </div>

            </form>
        </div>
    </div>

	<?php
				if(isset($_POST['addprofesional'])){
					$nombres = mysqli_real_escape_string($con,(strip_tags($_POST["nombres"],ENT_QUOTES)));
					$apellidos = mysqli_real_escape_string($con,(strip_tags($_POST["apellidos"],ENT_QUOTES)));
					$profesion = mysqli_real_escape_string($con,(strip_tags($_POST["profesion"],ENT_QUOTES)));	
					$tarjetaprofesional = mysqli_real_escape_string($con,(strip_tags($_POST["tarjetaprofesional"],ENT_QUOTES)));
					$idempresa = mysqli_real_escape_string($con,(strip_tags($_POST["idempresa"],ENT_QUOTES)));

					$verificartarjetaprofesional = mysqli_query($con, "SELECT * FROM profesional WHERE tarjetaprofesional='$tarjetaprofesional'");
					if(mysqli_num_rows($verificartarjetaprofesional) == 0){
							$insert = mysqli_query($con, "call sp_insert_profesional('$nombres', '$apellidos', '$profesion', '$tarjetaprofesional',  $idempresa)") or die(mysqli_error());
							if($insert){
								echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
							}else{
								echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
							}
						
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>El tarjetaprofesional ya esta registrado!</div>';
					}
				}
			?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script>
    $('.date').datepicker({
        format: 'dd-mm-yyyy',
    })
    </script>
</body>

</html>