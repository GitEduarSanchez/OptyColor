
<!-- Modal -->
<div class="modal fade" id="modaladdpaciente" tabindex="-1" role="dialog" aria-labelledby="modaladdpaciente"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Paciente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form class="form" action="insertpaciente.php" method="POST">
                        <label class="col-md-1 control-label">&nbsp;</label>
                        <div class="col-md-2 ">
                            <div class="row ">
                                <img src="img/perfil.jpg" class="img-thumbnail"
                                    style="min-width: 200px;min-height: 200px;max-width: 200px;max-height: 200px"
                                    alt="...">
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <input type="file" name="foto" class="form-control" required
                                        style="min-width: 200px;max-width: 200px">
                                </div>
                            </div>
                        </div>

                        <label class="col-md-1 control-label">&nbsp;</label>
                        <div class="col-md-7 ">
                            <div class="row">
                                <div class="form-group col-md-11">
                                    <label class="control-label">Nombres</label>
                                    <input type="text" name="nombres" class="form-control" placeholder="Nombres"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-11">
                                    <label class=" control-label">Apellidos</label>
                                    <input type="text" name="apellidos" class="form-control" placeholder="Apellidos"
                                        required>
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
                                    <input type="number" name="documento" class="form-control" placeholder="documento"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-5">
                                    <label class="control-label">Fecha de nacimiento</label>
                                    <input type="date" name="fechanacimiento" class="form-control"
                                        data-date-format="yyyy-mm-dd" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class=" control-label">Telefono</label>
                                    <input type="number" name="telefono" class="form-control" placeholder="Telefono"
                                        required>
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
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input type="submit" name="insertpaciente" class="btn btn-primary" value="Guardar">
            </div>
        </div>
    </div>
</div>