<fieldset>
    <legend>Conducta</legend>
    <div class="row">
        <label class="col-sm-2 control-label">&nbsp;</label>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="" value="RX Optica" readonly>
        </div>
        <div class="form-group col-md-6">
            <input type="text" class="form-control" name="rxoptica">
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 control-label">&nbsp;</label>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="" value="Farmacologia" readonly>
        </div>
        <div class="form-group col-md-6">
            <input type="text" class="form-control" name="farmacologia">
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 control-label">&nbsp;</label>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="" value="Remision" readonly>
        </div>
        <div class="form-group col-md-6">
            <input type="text" class="form-control" name="remision">
        </div>
    </div>
</fieldset>


<?php


    if(isset($_POST['addconducta'])){
        // Insert 
        $rxoptica = mysqli_real_escape_string($con,(strip_tags($_POST["rxoptica"],ENT_QUOTES)));
        $farmacologia = mysqli_real_escape_string($con,(strip_tags($_POST["farmacologia"],ENT_QUOTES)));
        $remision = mysqli_real_escape_string($con,(strip_tags($_POST["remision"],ENT_QUOTES)));       
        $insert = mysqli_query($con, "call sp_insert_conducta('$rxoptica', '$farmacologia', '$remision')") or die(mysqli_error());   
       
         //Mensaje de confirmacion
        if($insert){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
            }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
                }
    }
  	 
    
                
?>