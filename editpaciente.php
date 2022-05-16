<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar Paciente</title>

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
			<h2>Editar Datos</h2>
			<hr />
			
			<?php
			
			$idpaciente = mysqli_real_escape_string($con,(strip_tags($_GET["idpaciente"],ENT_QUOTES)));
			$sql = mysqli_query($con, "SELECT * FROM paciente WHERE idpaciente='$idpaciente'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$nombres = mysqli_real_escape_string($con,(strip_tags($_POST["nombres"],ENT_QUOTES)));
				$apellidos = mysqli_real_escape_string($con,(strip_tags($_POST["apellidos"],ENT_QUOTES)));
				$telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
				$fechanacimiento = mysqli_real_escape_string($con,(strip_tags($_POST["fechanacimiento"],ENT_QUOTES)));
				$documento = mysqli_real_escape_string($con,(strip_tags($_POST["documento"],ENT_QUOTES)));
				$idocupacion = mysqli_real_escape_string($con,(strip_tags($_POST["idocupacion"],ENT_QUOTES)));
				$identidad = mysqli_real_escape_string($con,(strip_tags($_POST["identidad"],ENT_QUOTES)));
				$idtipodocumento = mysqli_real_escape_string($con,(strip_tags($_POST["idtipodocumento"],ENT_QUOTES)));
			    $idacompanante = mysqli_real_escape_string($con,(strip_tags($_POST["idacompanante"],ENT_QUOTES))); 
			    
				
				$update = mysqli_query($con, "UPDATE empleados SET nombres='$nombres', lugar_nacimiento='$lugar_nacimiento', fecha_nacimiento='$fecha_nacimiento', direccion='$direccion', telefono='$telefono', puesto='$puesto', estado='$estado' WHERE codigo='$nik'") or die(mysqli_error());
				if($update){
					header("Location: edit.php?nik=".$nik."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
			}
			?>
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombres</label>
					<div class="col-sm-4">
						<input type="text" name="nombres" class="form-control"  value="<?php echo $row['nombres'] ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Apellidos</label>
					<div class="col-sm-4">
						<input type="text" name="apellidos" class="form-control" placeholder="Apellidos" value="<?php echo $row['apellidos'] ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Telefono</label>
					<div class="col-sm-4">
						<input type="number" name="telefono" class="form-control" placeholder="Telefono" value="<?php echo $row['telefono'] ?>" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Fecha de nacimiento</label>
					<div class="col-sm-4">
						<input type="date" name="fechanacimiento" class="form-control" value="<?php echo $row['fechanacimiento'] ?>" data-date-format="yyyy-mm-dd" required>
					</div>
				</div>
				<div class="form-group">
                    	<label class="col-sm-3 control-label">Tipo de Documento</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="idtipodocumento" required>
                            <?php 
                                $sql = mysqli_query($con, "SELECT * FROM tipodocumento where idtipodocumento='$idtipodocumento'");
                                $row = mysqli_fetch_assoc($sql);
                                echo $row['sigla'];
                            ?>
                            <option value="<?php echo $row['idtipodocumento'] ?>" ><?php $row['sigla'] .' - '. $row['descripcion'] ?> </option>
                            <?php
							$sql = mysqli_query($con, "SELECT * FROM tipodocumento");
							$row = mysqli_fetch_assoc($sql);
							do {
								echo '
								<option value="' . $row[idtipodocumento] . '">' . $row['sigla'] .' - '. $row['descripcion'] . '</option>
								';
							} while ($row = mysqli_fetch_assoc($sql));
							
							?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
					<label class="col-sm-3 control-label">Documento</label>
					<div class="col-sm-4">
						<input type="number" name="documento" class="form-control" placeholder="documento" required>
					</div>
				</div>
                <div class="form-group">
                    	<label class="col-sm-3 control-label">Entidad</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="identidad" required>
                            <option value="">Seleccione </option>
                            <?php
							$sql = mysqli_query($con, "SELECT * FROM entidad");
							$row = mysqli_fetch_assoc($sql);
							do {
								echo '
								<option value="' . $row[identidad] . '">' . $row['razonsocial'] . '</option>
								';
							} while ($row = mysqli_fetch_assoc($sql));
							?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    	<label class="col-sm-3 control-label">Ocupacion</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="idocupacion" required>
                            <option value="">Seleccione </option>
                            <?php
							$sql = mysqli_query($con, "SELECT * FROM ocupacion");
							$row = mysqli_fetch_assoc($sql);
							do {
								echo '
								<option value="' . $row[idocupacion] . '">' . $row['descripcion'] . '</option>
								';
							} while ($row = mysqli_fetch_assoc($sql));
							?>
                        </select>
                    </div>
                </div>
               <div class="form-group">
                    	<label class="col-sm-3 control-label">Acompañante</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="idacompanante" required>
                            <option value="">Seleccione </option>
                            <?php
							$sql = mysqli_query($con, "SELECT * FROM acompanante");
							$row = mysqli_fetch_assoc($sql);
							do {
								echo '
								<option value="' . $row[idacompanante] . '">' . $row['nombres'] . '</option>
								';
							} while ($row = mysqli_fetch_assoc($sql));
							?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
					<label class="col-sm-3 control-label">Foto</label>
					<div class="col-sm-4">
						<input type="file" name="foto" class="form-control" placeholder="foto" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="addpaciente" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

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