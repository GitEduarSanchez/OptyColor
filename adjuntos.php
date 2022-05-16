 <?php     include('funciones.php')  ?>

 <fieldset>
     <legend>Adjuntar Archivos</legend>
     <div class="col-md-2">
         <label for="">&nbsp;</label>
     </div>
     <div class="col-md-6">

         <div id="archivos">
             <div id="archivo1">
                 <input type="file" name="miarchivo[]">
                 <br>
             </div>

         </div>
         <div class="form-group col-md">
             <div>
                 <br>
                 <a href="#" onclick="anadirArchivo()"><span class="glyphicon glyphicon-plus-sign">Agregar </span></a>
             </div>
         </div>
     </div>


 </fieldset>