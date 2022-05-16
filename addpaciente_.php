<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Paciente</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-datepicker.css" rel="stylesheet">
    <link href="css/style_nav.css" rel="stylesheet">
    <link href="css/generalstyle.css" rel="stylesheet">
    <style>
    .content {
        margin-top: 80px;

    }

    body {
        margin-bottom: 60px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <?php include("nav.php");?>
    </nav>
    <div class="container">
        <div class="content">
            <h2>Agregar Paciente</h2>
            <hr />

            <form class="form" action="insertpaciente.php" method="POST">
                <label class="col-md-1 control-label">&nbsp;</label>
                <div class="col-md-2 ">
                    <div class="row ">
                        <img src="img/perfil.jpg" class="img-thumbnail"
                            style="min-width: 200px;min-height: 200px;max-width: 200px;max-height: 200px" alt="...">
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <input type="file" name="foto" class="form-control" required
                                style="min-width: 200px;max-width: 200px">
                        </div>
                    </div>
                </div>

                <label class="col-sm-1 control-label">&nbsp;</label>
                <div class="col-md-7 ">
                    <div class="row">
                        <div class="form-group col-md-11">
                            <label class="control-label">Nombres</label>
                            <input type="text" name="nombres" class="form-control" placeholder="Nombres" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-11">
                            <label class=" control-label">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label class="control-label">Tipo Documento</label>
                            <select class="form-control" name="idtipodocumento" required>
                                <option value="">Seleccione </option>
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
                        <div class="form-group col-md-6">
                            <label class=" control-label">Documento</label>
                            <input type="number" name="documento" class="form-control" placeholder="documento" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label class="control-label">Fecha de nacimiento</label>
                            <input type="date" name="fechanacimiento" class="form-control" data-date-format="yyyy-mm-dd"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class=" control-label">Telefono</label>
                            <input type="number" name="telefono" class="form-control" placeholder="Telefono" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-11">
                            <label class=" control-label">Entidad</label>
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
                    <div class="row">
                        <div class="form-group col-md-11">
                            <label class=" control-label">Ocupacion</label>
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
                    <div class="row">
                        <div class="form-group col-md-11">
                            <label class=" control-label">Acompañante</label>
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
                </div>
                <div class="col-md-8">
                    <label class="col-md control-label">&nbsp;</label>
                </div>

                <div class="col-md-3">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md">
                                <input type="submit" name="addpaciente" class="btn  btn-primary" value="Guardar datos">
                                <a href="index.php" class="btn  btn-danger">Cancelar</a>
                            </div>
                        </div>
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