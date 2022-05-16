<!------------Formulario Reporte inicial Front HTML -------->
<br>

<div class="row">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="form-group col-md-4">
        <label for="paciente"> Paciente </label>
        <select class="form-control" name="paciente" required>
            <option value="">Seleccione </option>
            <!-- ---- Codigo PHP cargar combo con nombre de pacientes ---- -->
            <?php
                                $sql = mysqli_query($con, "SELECT * FROM paciente");
                                $row = mysqli_fetch_assoc($sql);
                                do {
                                    echo '
                                    <option value="' . $row[idpaciente] . '">' . $row['nombres'] .' '. $row['apellidos'] . '</option>
                                    ';
                                } while ($row = mysqli_fetch_assoc($sql));
                                ?>
        </select>
    </div>
    <div class="form-group col-md-1">
        <label class="col-md control-label">&nbsp;</label>
        <div class="row">
            <a class="btn btn-primary btn-sm" name="agregarpaciente" data-toggle="modal"
                data-target="#modaladdpaciente"><span class="glyphicon  glyphicon-plus"></span></a>
            <a class="btn btn-primary btn-sm" name="agregarpaciente" data-toggle="modal"
                data-target="#modaladdpaciente"><span class="glyphicon  glyphicon-edit"></span></a>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="fecha  "> Fecha </label>
        <input type="date" class="form-control" name="fecha" required Value="<?php echo date("Y-m-d");?>">

    </div>
</div>

<div class="row">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="form-group col-md-8">
        <label for="motivoconsulta"> Motivo Consulta </label>
        <textarea type="text" class="form-control" aria-label="With textarea" name="motivoconsulta" value=""></textarea>
    </div>
</div>
<div class="row">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="form-group col-md-4">
        <label for="anamnesis"> Anamnesis </label>
        <input type="text" class="form-control" name="anamnesis" value="">
    </div>
    <div class="form-group col-md-4">
        <label for="antecedentepersonal"> Antecedente Personal</label>
        <input type="text" name="antecedentepersonal" class="form-control" value="">
    </div>
</div>
<div class="row">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="form-group col-md-4">
        <label for="antecedenteocular"> Antecedente Ocular</label>
        <input type="text" name="antecedenteocular" class="form-control" value="">
    </div>
    <div class="form-group col-md-4">
        <label for="antecedentefamiliar"> Antecedente Familiar</label>
        <input type="text" name="antecedentefamiliar" class="form-control" value="">
    </div>
</div>




<!-- Modal -->
<?php include("modal.php");?>