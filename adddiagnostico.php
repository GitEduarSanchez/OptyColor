 <fieldset>
     <legend>Diagnostico</legend>
     <div class="row">
         <label class="col-sm-2 control-label">&nbsp;</label>
         <div class="form-group col-md-2">
             <input type="text" class="form-control" name="" value="Refractivo" readonly>
         </div>
         <div class="form-group col-md-6">
             <input type="text" class="form-control" name="refractivo">
         </div>
     </div>
     <div class="row">
         <label class="col-sm-2 control-label">&nbsp;</label>
         <div class="form-group col-md-2">
             <input type="text" class="form-control" name="" value="Motor" readonly>
         </div>
         <div class="form-group col-md-6">
             <input type="text" class="form-control" name="motor">
         </div>
     </div>
     <div class="row">
         <label class="col-sm-2 control-label">&nbsp;</label>
         <div class="form-group col-md-2">
             <input type="text" class="form-control" name="" value="Patologia" readonly>
         </div>
         <div class="form-group col-md-6">
             <input type="text" class="form-control" name="patologia">
         </div>
     </div>
 </fieldset>


 <?php


    if(isset($_POST['adddiagnostico'])){
        // Insert 
        $refractivo = mysqli_real_escape_string($con,(strip_tags($_POST["refractivo"],ENT_QUOTES)));
        $motor = mysqli_real_escape_string($con,(strip_tags($_POST["motor"],ENT_QUOTES)));
        $patologia= mysqli_real_escape_string($con,(strip_tags($_POST["patologia"],ENT_QUOTES)));       
        $insert = mysqli_query($con, "call sp_insert_diagnostico('$refractivo', '$motor', '$patologia')") or die(mysqli_error());   
       
         //Mensaje de confirmacion
        if($insert){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
            }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
                }
    }
  	 
    
                
?>