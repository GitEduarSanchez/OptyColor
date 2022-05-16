
    <fieldset>
        <legend>Motilidad Ocular</legend>
        <div class="row">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="form-group col-md-2">
                <label for="odvp"> &nbsp;</label>
                <input type="text" class="form-control" name="oivp" value="OI VP" readonly style="text-align:center">
            </div>
            <div class="form-group col-md-2">
                <label for="covertest">COVER TEST</label>
                <input type="text" class="form-control" name="covertestvp" value="">
            </div>
            <div class="form-group col-md-2">
                <label for="kappa">KAPPA</label>
                <input type="text" name="kappavp" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <label for="hirschberg">HIRSCHBERG</label>
                <input type="number" name="hirschbergvp" class="form-control">
            </div>
        </div>
        <div class="row">
            <label class="col-sm-2 control-label">&nbsp;</label>
            <div class="form-group col-md-2" >
                <input type="text" class="form-control" name="odvl" value="OD VL" readonly style="text-align:center">
            </div>
            <div class="form-group col-md-2">
                <input type="text" class="form-control" name="covertestvl">
            </div>
            <div class="form-group col-md-2">
                <input type="text" name="kappavl" class="form-control">
            </div>
            <div class="form-group col-md-2">
                <input type="number" name="hirschbergvl" class="form-control">
            </div>

        </div>
       
    </fieldset>



<!-- ---- Codigo PHP insert ---- -->
<?php


    if(isset($_POST['addmotilidadocular'])){
        // Insert cover test tipo vision VP
        $idtipotest=1;
        $idtipovision=2;
        $covertestvp = mysqli_real_escape_string($con,(strip_tags($_POST["covertestvp"],ENT_QUOTES)));       
        $insert = mysqli_query($con, "call sp_insert_motilidadocular('$covertestvp', '$idtipovision', '$idtipotest')") or die(mysqli_error());   
        // Insert kappa tipo vision VP
        $idtipotest=2;
        $idtipovision=2;
        $kappavp = mysqli_real_escape_string($con,(strip_tags($_POST["kappavp"],ENT_QUOTES)));       
        $insert = mysqli_query($con, "call sp_insert_motilidadocular('$kappavp', '$idtipovision', '$idtipotest')") or die(mysqli_error());    
         // Insert hirschberg tipo vision VP
         $idtipotest=3;
         $idtipovision=2;
         $hirschbergvp = mysqli_real_escape_string($con,(strip_tags($_POST["hirschbergvp"],ENT_QUOTES)));       
         $insert = mysqli_query($con, "call sp_insert_motilidadocular('$hirschbergvp', '$idtipovision', '$idtipotest')") or die(mysqli_error());   
         // Insert cover test tipo vision VL
         $idtipotest=1;
         $idtipovision=1;
         $covertestvl = mysqli_real_escape_string($con,(strip_tags($_POST["covertestvl"],ENT_QUOTES)));       
         $insert = mysqli_query($con, "call sp_insert_motilidadocular('$covertestvl', '$idtipovision', '$idtipotest')") or die(mysqli_error());   
         // Insert kappa tipo vision VL
         $idtipotest=2;
         $idtipovision=1;
         $kappavp = mysqli_real_escape_string($con,(strip_tags($_POST["kappavp"],ENT_QUOTES)));       
         $insert = mysqli_query($con, "call sp_insert_motilidadocular('$kappavp', '$idtipovision', '$idtipotest')") or die(mysqli_error());    
          // Insert hirschberg tipo vision VL
          $idtipotest=3;
          $idtipovision=1;
          $hirschbergvl = mysqli_real_escape_string($con,(strip_tags($_POST["hirschbergvl"],ENT_QUOTES)));       
          $insert = mysqli_query($con, "call sp_insert_motilidadocular('$hirschbergvl', '$idtipovision', '$idtipotest')") or die(mysqli_error());   
         


         //Mensaje de confirmacion
        if($insert){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
            }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
                }
    }
  	 
    
                
?>