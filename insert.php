<?php
 include ("conexion.php");
 include ("addhistoriaclinica.php");
 
 if(isset($_POST['addhistoriaclinica'])){  
                    
        //-- ---- Codigo PHP insert Motivo Consulta ---- 
        $fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha"],ENT_QUOTES)));
        $motivoconsulta = mysqli_real_escape_string($con,(strip_tags($_POST["motivoconsulta"],ENT_QUOTES)));
        $anamnesis = mysqli_real_escape_string($con,(strip_tags($_POST["anamnesis"],ENT_QUOTES)));
        $antecedentepersonal = mysqli_real_escape_string($con,(strip_tags($_POST["antecedentepersonal"],ENT_QUOTES)));
        $antecedenteocular = mysqli_real_escape_string($con,(strip_tags($_POST["antecedenteocular"],ENT_QUOTES)));
        $antecedentefamiliar = mysqli_real_escape_string($con,(strip_tags($_POST["antecedentefamiliar"],ENT_QUOTES)));
        $idpaciente = mysqli_real_escape_string($con,(strip_tags($_POST["paciente"],ENT_QUOTES)));
        $insert = mysqli_query($con, "call sp_insert_historiaclinica('$fecha', '$motivoconsulta ', '$anamnesis', '$antecedentepersonal', '$antecedenteocular', '$antecedentefamiliar', '$idpaciente')") or die(mysqli_error());
            
        //-- ---- Codigo PHP insert Agudeza Visual sin correccion---- -->                      
            // Insert ojo derecho
            $vlod = mysqli_real_escape_string($con,(strip_tags($_POST["vlodsincorrecion"],ENT_QUOTES)));
            $phod = mysqli_real_escape_string($con,(strip_tags($_POST["phodsincorrecion"],ENT_QUOTES)));
            $vpod = mysqli_real_escape_string($con,(strip_tags($_POST["vpodsincorrecion"],ENT_QUOTES)));
            $correccionod = 0;
            $sc_OD = 2;
            $insert = mysqli_query($con, "call sp_insert_agudezavisual('$vlod', '$phod ', '$vpod', '$correccionod', '$sc_OD')") or die(mysqli_error());   
            // Insert ojo izquierdo 
            $vloi = mysqli_real_escape_string($con,(strip_tags($_POST["vloisincorrecion"],ENT_QUOTES)));
            $phoi = mysqli_real_escape_string($con,(strip_tags($_POST["phoisincorrecion"],ENT_QUOTES)));
            $vpoi = mysqli_real_escape_string($con,(strip_tags($_POST["vpoisincorrecion"],ENT_QUOTES)));
            $correccionoi = 0;
            $sc_OI = 1;
            $insert = mysqli_query($con, "call sp_insert_agudezavisual('$vloi', '$phoi', '$vpoi', '$correccionoi', '$sc_OI')") or die(mysqli_error());
            // Insert ambos ojos
            $vlao = mysqli_real_escape_string($con,(strip_tags($_POST["vlaosincorrecion"],ENT_QUOTES)));
            $phao = mysqli_real_escape_string($con,(strip_tags($_POST["phaosincorrecion"],ENT_QUOTES)));
            $vpao = mysqli_real_escape_string($con,(strip_tags($_POST["vpaosincorrecion"],ENT_QUOTES)));
            $correccionao = 0;
            $sc_AO = 3;
            $insert = mysqli_query($con, "call sp_insert_agudezavisual('$vlao', '$phao ', '$vpao', '$correccionao', '$sc_AO')") or die(mysqli_error());                  
        //-- ---- Codigo PHP insert Agudeza visual con correccion---- -->
            // Insert ojo derecho
            $vlod = mysqli_real_escape_string($con,(strip_tags($_POST["vlodconcorrecion"],ENT_QUOTES)));
            $phod = mysqli_real_escape_string($con,(strip_tags($_POST["phodconcorrecion"],ENT_QUOTES)));
            $vpod = mysqli_real_escape_string($con,(strip_tags($_POST["vpodconcorrecion"],ENT_QUOTES)));
            $correccionod = 1;
            $cc_OD = 2;
            $insert = mysqli_query($con, "call sp_insert_agudezavisual('$vlod', '$phod', '$vpod', '$correccionod', '$cc_OD')") or die(mysqli_error());   
            // Insert ojo izquierdo 
            $vloi = mysqli_real_escape_string($con,(strip_tags($_POST["vloiconcorrecion"],ENT_QUOTES)));
            $phoi = mysqli_real_escape_string($con,(strip_tags($_POST["phoiconcorrecion"],ENT_QUOTES)));
            $vpoi = mysqli_real_escape_string($con,(strip_tags($_POST["vpoiconcorrecion"],ENT_QUOTES)));
            $correccionoi = 1;
            $cc_OI = 1;
            $insert = mysqli_query($con, "call sp_insert_agudezavisual('$vloi', '$phoi', '$vpoi', '$correccionoi', '$cc_OI')") or die(mysqli_error());
            // Insert ambos ojos
            $vlao = mysqli_real_escape_string($con,(strip_tags($_POST["vlaoconcorrecion"],ENT_QUOTES)));
            $phao = mysqli_real_escape_string($con,(strip_tags($_POST["phaoconcorrecion"],ENT_QUOTES)));
            $vpao = mysqli_real_escape_string($con,(strip_tags($_POST["vpaoconcorrecion"],ENT_QUOTES)));
            $correccionao = 1;
            $cc_AO = 3;
            $insert = mysqli_query($con, "call sp_insert_agudezavisual('$vlao', '$phao ', '$vpao', '$correccionao', '$cc_AO')") or die(mysqli_error());           
                
    //Mensaje de confirmacion
    if($insert){
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
        }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
            }
            
        		    

        }

?>