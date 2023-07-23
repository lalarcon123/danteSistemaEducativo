<?php
    require_once('includes/load.php');
    $user = $_SESSION['user_id'];
?>
<?php

 if(isset($_POST['upd'])) {

     $req_fields = array('id',
         'inicio',
         'fin',
         'estado');

     validate_fields($req_fields);

     if(empty($errors)) {

         $id      = remove_junk($db->escape($_POST['id']));
         $inicio  = remove_junk($db->escape($_POST['inicio']));
         $fin     = remove_junk($db->escape($_POST['fin']));
         $estado  = remove_junk($db->escape($_POST['estado']));

         if ($estado=="ACTIVO")
         {
             $estado ="1";
         } else {
             $estado ="0";
         }

         $query = "UPDATE periodo_lectivo SET";
         $query .= " inicio ='{$inicio}',";
         $query .= " fin    ='{$fin}',";
         $query .= " estado ='{$estado}'";
         $query .= " WHERE id = {$id}";

         $result   = $db->query($query);
         if($result && $db->affected_rows() === 1){
            $session->msg('s',"Período ha sido actualizado. ");
         } else {
             $session->msg('d',' Lo siento, actualización falló.');
         }

     } else{
         $session->msg("d", $errors);
     }
 }

?>
    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg-udp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> Editar Período Lectivo</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left input_mask" method="post" id="upd" name="upd" enctype="multipart/form-data">
                        <div id="result2"></div>
                        <input type="hidden" name="id" id="id" >
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Inicio<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <input type="text" class="form-control" name="inicio" id="inicio" placeholder="Inicio" maxlength="50" required onKeyUp="this.value=this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Fin<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <input type="text" class="form-control" name="fin" id="fin" placeholder="Fin" maxlength="50" required onKeyUp="this.value=this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="estado" id="estado" required>
                                    <option value="ACTIVO"> Activo</option>
                                    <option value="INACTIVO"> Inactivo</option>  
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <input name="upd" type="submit" class="btn btn-primary" value="Guardar"></input>
                            </div>
                        </div>
                    </form>                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div> <!-- /Modal -->