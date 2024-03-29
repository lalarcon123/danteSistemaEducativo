<?php
    require_once('includes/load.php');
?>
<?php
  if(isset($_POST['upd'])) {
    $req_fields = array('descripcion', 'observacion', 'pagina', 'estado');

    validate_fields($req_fields);
    if(empty($errors)){
         $id_menu         = remove_junk($db->escape($_POST['id_menu']));
         $descripcion     = remove_junk($db->escape($_POST['descripcion']));
         $observacion     = remove_junk($db->escape($_POST['observacion']));
         $pagina          = remove_junk($db->escape($_POST['pagina']));
         $estado          = remove_junk($db->escape($_POST['estado']));
         if ($estado=='ACTIVO'){
             $estado= '1';
         } else {
             $estado= '0';
         }

         $sql  = "UPDATE menu SET descripcion ='{$descripcion}', ";
         $sql .=                " observacion ='{$observacion}', ";
         $sql .=                " pagina ='{$pagina}', ";
         $sql .=                " estado='{$estado}' ";
         $sql .=                " WHERE id_menu ='{$db->escape($id_menu)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){            
            $session->msg('s',"Menú Actualizada ");
          } else {
            $session->msg('d',' Lo siento no se actualizó los datos.');
          }
    } else {
      $session->msg("d", $errors);
    }
  }
?>
<script>
    function NumText(string){//solo letras y numeros
        var out = '';
        //Se añaden las letras validas
        var filtro = ' abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890';//Caracteres validos

        for (var i=0; i<string.length; i++)
            if (filtro.indexOf(string.charAt(i)) != -1)
                out += string.charAt(i);
        return out;
    }
    function Num(string){//solo numeros
        var out = '';
        //Se añaden las letras validas
        var filtro = '1234567890';//Caracteres validos

        for (var i=0; i<string.length; i++)
            if (filtro.indexOf(string.charAt(i)) != -1)
                out += string.charAt(i);
        return out;
    }
</script>
    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg-udp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> Editar Módulos</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left input_mask" method="post" id="upd" name="upd" enctype="multipart/form-data">
                        <div id="result2"></div>
                        <input type="hidden" name="id_menu" id="id_menu" >
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción"  required onKeyUp="this.value=this.value.toUpperCase();">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Observación<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <textarea class="form-control" name="observacion" id="observacion" placeholder="Observación"  required onKeyUp="this.value=this.value.toUpperCase();"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Página<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <input type="text" class="form-control" name="pagina" id="pagina" placeholder="Página"  required onKeyUp="this.value=this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="estado" id="estado" required>
                                    <option value="ACTIVO"> ACTIVO</option>
                                    <option value="INACTIVO"> INACTIVO</option>  
                                </select>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <input name="upd" type="submit" class="btn btn-primary" value="Guardar">
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