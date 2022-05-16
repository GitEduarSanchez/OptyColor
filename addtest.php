<fieldset>
    <legend>Test</legend>
    <div class="row">
        <label class="col-sm-2 control-label">&nbsp;</label>
        <div class="form-group col-md-1">
            <label for="od">&nbsp; </label>
            <input type="text" class="form-control" name="" value="OD" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="tonometriagoldmanod">Tonometria: Goldman</label>
            <input type="text" class="form-control" name="tonometriagoldmanod" value="">
        </div>
        <div class="form-group col-md-2">
            <label for="colorishiharaod">Color: Ishihara</label>
            <input type="text" name="colorishiharaod" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <label for="profundidadlamoscaod">Profundidad: La Mosca</label>
            <input type="text" name="profundidadlamoscaod" class="form-control">
        </div>
    </div>
    <div class="row">
        <label class="col-sm-2 control-label">&nbsp;</label>
        <div class="form-group col-md-1">
            <input type="text" class="form-control" name="" value="OI" readonly>
        </div>
        <div class="form-group col-md-2">
            <input type="text" class="form-control" name="tonometriagoldmanoi">
        </div>
        <div class="form-group col-md-2">
            <input type="text" name="colorishiharaoi" class="form-control">
        </div>
        <div class="form-group col-md-3">
            <input type="text" name="profundidadlamoscaoi" class="form-control">
        </div>
    </div>
</fieldset>



<!-- ---- Codigo PHP insert ---- -->
<?php


    if(isset($_POST['addtest'])){
        // Insert tonometria goldman test tipo vision OD
        $idtipotest=4;
        $idtipovision=2;
        $tonometriagoldmanod = mysqli_real_escape_string($con,(strip_tags($_POST["tonometriagoldmanod"],ENT_QUOTES)));       
        $insert = mysqli_query($con, "call sp_insert_test('$tonometriagoldmanod', '$idtipotest', '$idtipovision')") or die(mysqli_error());   
        // Insert color ishihara tipo vision OD
        $idtipotest=5;
        $idtipovision=2;
        $colorishiharaod = mysqli_real_escape_string($con,(strip_tags($_POST["colorishiharaod"],ENT_QUOTES)));       
        $insert = mysqli_query($con, "call sp_insert_test('$colorishiharaod', '$idtipotest', '$idtipovision')") or die(mysqli_error());    
         // Insert profundidad lamosca tipo vision OD
         $idtipotest=6;
         $idtipovision=2;
         $profundidadlamoscaod = mysqli_real_escape_string($con,(strip_tags($_POST["profundidadlamoscaod"],ENT_QUOTES)));       
         $insert = mysqli_query($con, "call sp_insert_test('$profundidadlamoscaod', '$idtipotest', '$idtipovision')") or die(mysqli_error());   
         
        // Insert tonometria goldman test tipo vision OI
        $idtipotest=4;
        $idtipovision=1;
        $tonometriagoldmanoi = mysqli_real_escape_string($con,(strip_tags($_POST["tonometriagoldmanoi"],ENT_QUOTES)));       
        $insert = mysqli_query($con, "call sp_insert_test('$tonometriagoldmanoi', '$idtipotest', '$idtipovision')") or die(mysqli_error());   
        // Insert color ishihara tipo vision OD
        $idtipotest=5;
        $idtipovision=1;
        $colorishiharaoi = mysqli_real_escape_string($con,(strip_tags($_POST["colorishiharaoi"],ENT_QUOTES)));       
        $insert = mysqli_query($con, "call sp_insert_test('$colorishiharaoi', '$idtipotest', '$idtipovision')") or die(mysqli_error());    
        // Insert profundidad lamosca tipo vision OD
        $idtipotest=6;
        $idtipovision=1;
        $profundidadlamoscaoi = mysqli_real_escape_string($con,(strip_tags($_POST["profundidadlamoscaoi"],ENT_QUOTES)));       
        $insert = mysqli_query($con, "call sp_insert_test('$profundidadlamoscaoi', '$idtipotest', '$idtipovision')") or die(mysqli_error());   
        
         //Mensaje de confirmacion
        if($insert){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
            }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
                }
    }
  	 
    
                
?>