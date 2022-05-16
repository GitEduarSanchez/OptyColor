
<?php
//include("addpaciente.php");
include("conexion.php");


			if(isset($_POST['insertpaciente'])){
				$nombres = mysqli_real_escape_string($con,(strip_tags($_POST["nombres"],ENT_QUOTES)));
				$apellidos = mysqli_real_escape_string($con,(strip_tags($_POST["apellidos"],ENT_QUOTES)));
				$telefono = mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
				$fechanacimiento = mysqli_real_escape_string($con,(strip_tags($_POST["fechanacimiento"],ENT_QUOTES)));
				$documento = mysqli_real_escape_string($con,(strip_tags($_POST["documento"],ENT_QUOTES)));
				$foto = $documento.'jpg';
				$idocupacion = mysqli_real_escape_string($con,(strip_tags($_POST["idocupacion"],ENT_QUOTES)));
				$identidad = mysqli_real_escape_string($con,(strip_tags($_POST["identidad"],ENT_QUOTES)));
				$idtipodocumento = mysqli_real_escape_string($con,(strip_tags($_POST["idtipodocumento"],ENT_QUOTES)));
			    $idacompanante = mysqli_real_escape_string($con,(strip_tags($_POST["idacompanante"],ENT_QUOTES)));

				$verificascedula = mysqli_query($con, "SELECT * FROM paciente WHERE documento='$documento'");
				if(mysqli_num_rows($verificascedula) == 0){
						$insert = mysqli_query($con, "call sp_insert_paciente('$nombres', '$apellidos', '$telefono', '$fechanacimiento', '$documento', '$foto', $idocupacion, $identidad, $identidad, $idacompanante)") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}
					 
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>El documento ya esta registrado!</div>';
				}
			}
			?>