<?php
  $id = (int)$_GET['id'];
  $page_title = 'Agregar Estudiantes';
  require_once('includes/load.php');
  $all_estudiantes = find_all_estudiantes('users');
  $user = $_SESSION['user_id'];

?>
<?php

if(isset($_POST['agregar_imagenes'])) {
    $req_fields = array('id_estudiante',
                        'parentezco');

    validate_fields($req_fields);

    if (empty($errors)) {

        $id_representante  = remove_junk($db->escape($_POST['id_usuario']));
        $id_estudiante     = remove_junk($db->escape($_POST['id_estudiante']));
        $parentezco        = remove_junk($db->escape($_POST['parentezco']));

        $query = "INSERT  representantes_estudiantes (id_representante, id_estudiante, parentezco) VALUES (";
        $query .= " '{$id_representante}', '{$id_estudiante}', '{$parentezco}'";
        $query .= ")";
        if ($db->query($query)) {
            $session->msg('s', "Estudiante agregado exitosamente. ");
        } else {
            $session->msg('d', ' Lo siento, registro falló.');
            redirect('edit_asig_estudiantes.php?id='.$id_representante, false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('edit_asig_estudiantes.php?id='.$id_representante, false);
    }
} else {
    //$session->msg('d', 'Debe cargar el título.');
}
if(isset($_POST['regresar'])) {
        redirect('detallesasigestudiantes.php', false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Datatables -->
    <link href="css/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="css/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="css/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

    <!-- bootstrap-daterangepicker -->
    <link href="css/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.min.css" rel="stylesheet">

    <!-- MICSS button[type="file"] -->
    <link rel="stylesheet" href="css/micss.css">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


</head>
<body>
<script type="text/javascript">
    $( function() {
        $( "#fecha_incorporacion" ).datepicker();
    } );
    $( function() {
        $( "#fecha_registro" ).datepicker();
    } );
</script>
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
</script>
  <br>
  <br>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span>Agregar Estudiantes</span>
                </strong>
            </div>
            <div class="panel-body">
                <div class="panel-body">
                    <div class="col-md-12">
                        <form method="post" action="edit_asig_estudiantes.php?id=<?php echo $id ?>" enctype="multipart/form-data">
                            <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id;?>">
                            <div class="row">
                              <div class="col-md-8">
                                  <div class="form-group">
                                      <label for="qty">Estudiante*</label>
                                      <div class="input-group">
                                        <select class="form-control" name="id_estudiante">
                                              <option value="">Selecciona un Estudiante</option>
                                              <?php  foreach ($all_estudiantes as $users): ?>
                                                  <option value="<?php echo (int)$users['id']; ?>">
                                                      <?php echo remove_junk($users['nombres']); ?>
                                                  </option>
                                              <?php endforeach; ?>
                                        </select>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-8">
                                  <div class="form-group">
                                      <label for="qty">Parentezco*</label>
                                      <div class="input-group">
                                        <select class="form-control" name="parentezco">
                                            <option value="1">HIJO</option>
                                            <option value="2">HERMANO</option>  
                                            <option value="3">SOBRINO</option>  
                                        </select>
                                      </div>
                                  </div>
                              </div>
                            </div>
                            <div><button type="submit" name="agregar_imagenes" class="btn btn-primary">Agregar Estudiante</button><form method="post" action="regresar"><button type="submit" name="regresar" class="btn btn-primary">Regresar</button></form>
                            </div>
                            <div class="x_content">
                                <table id="Dt_detalleestudiantes" class="table table-bordered table-hover" cellpadding="0" width="100%">
                                    <thead>
                                    <tr>
                                        <!--<th>id</th>-->
                                        <th>Estudiante</th>
                                        <th>Parentezco</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</body>
</html>
    <!-- jQuery -->
    <script src="js/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="css/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="js/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="css/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="css/iCheck/icheck.min.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="css/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>



    <!-- Datatables-->

    <script src="js/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="css/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="js/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="css/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="js/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="js/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="js/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="js/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="js/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="js/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="css/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="js/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="js/jszip/dist/jszip.min.js"></script>
    <script src="js/pdfmake/build/pdfmake.min.js"></script>
    <script src="js/pdfmake/build/vfs_fonts.js"></script>

    <!-- DateJS -->
    <script src="js/moment/min/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).on("ready",function(){
            detalleservicio();
        });
        var detalleservicio = function(){
            var id = <?php echo $id_usuario;?>;
            //alert (id);
            var table =$("#Dt_detalleestudiantes").DataTable({
                "destroy":true,
                "ajax":{
                    "method":"POST",
                    "url":"ajax/ListadoEstudiantesRepresentantes.php?id="+id,
                   error: function (result){
                     null;
                   }
                },
                "columns":[
                    //{"data":"id"},
                    {"data":"nombre_estudiante"},
                    {"data":"parentezco"},
                    {"data":"estado"},
                    {"defaultContent":"<button type='button'  class='eliminar btn btn-lg btn-link' onclick='eliminar_titulo();' title='Eliminar'><span class='glyphicon glyphicon-trash'></span></button>"}
                ],
                "language": idioma_espanol
            });
            eliminar_titulo("#Dt_detalleestudiantes tbody",table);
        }
        var eliminar_titulo = function(tbody,table) {
           $(tbody).on("click","button.eliminar",function() {
                var data          = table.row( $(this).parents("tr")).data();
                var id            = data.id_titulo_docente;
                var id_usuario    = data.id_usuario;
                window.location.href="deletetitulo.php?id="+id+"&usuario="+id_usuario;
            });
        }
        var idioma_espanol = {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    </script>
<?php if(isset($db)) { $db->db_disconnect(); } ?>