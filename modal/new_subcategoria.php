<?php
    require_once('includes/load.php');
    $all_categoria = find_all('categoria');
?>
<?php

if(isset($_POST['add'])) {
   $req_fields = array('id_categoria','descripcion');
   validate_fields($req_fields);
  
   if(empty($errors)){
        $descripcion     = remove_junk($db->escape($_POST['descripcion']));
        $id_categoria    = remove_junk($db->escape($_POST['id_categoria']));
       // $hoy   = Date("Y-m-d H:i:s");        
        $query = "INSERT INTO subcategoria (";
        $query .="id_categoria, descripcion";
        $query .=") VALUES (";
        $query .=" '{$id_categoria}', '{$descripcion}'";
        $query .=")";
        //echo $query;
        if($db->query($query)){
          //sucess
          $session->msg('s',"Categoría creada exitosamente");
      
        } else {
          echo "<script>alert('No se pudo crear la categoría.');</script>";
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
    function aMayusculas(obj,id){
        obj = obj.toUpperCase();
        document.getElementById(id).value = obj;
    }
</script>
    <div> <!-- Modal -->

        <div class="panel-heading clearfix">
            <div class="pull-left">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg-add"><i class="fa fa-plus-circle"></i> Agregar Subcategoría <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                </button>
            </div>
        </div>


    </div>
    <div class="modal fade bs-example-modal-lg-add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Subcategoría</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left input_mask" method="post" id="add" name="add" enctype="multipart/form-data">
                        <div id="result"></div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Subcategoría<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="id_categoria" id="id_categoria">
                                   <option value="">Selecciona la categoría</option>
                                  <?php foreach ($all_categoria as $categoria):?>
                                   <option value="<?php echo $categoria['id'];?>"><?php echo ucwords($categoria['descripcion']);?></option>
                                <?php endforeach;?>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <input type="text" class="form-control" name="descripcion" placeholder="Descripción"  onKeyUp="this.value=this.value.toUpperCase();" required >
                            </div>
                        </div>

                        <!--<div class="ln_solid"></div>-->
                        <div class="form-group">
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                              <input name="add" type="submit" class="btn btn-primary" value="Guardar"></input>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_cerrar" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div> <!-- /Modal -->
