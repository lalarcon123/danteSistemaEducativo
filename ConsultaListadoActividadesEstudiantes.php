<?php
  $id_curso         = (int)$_GET['id_curso'];
  $page_title = 'Listado Estudiantes';
  require_once('includes/load.php');

  $user = $_SESSION['user_id'];
  $listado_cursos  =find_all_cursos('curso_oferta', $user);
  $nombre_curso = "";
  if (!empty($id_curso)){
    $curso_oferta = find_by_id('curso_oferta',$id_curso);
    if (isset($curso_oferta['id_curso'])){
        $curso_id = $curso_oferta['id_curso'];
        $curso = find_by_id('curso',$curso_id);
        if (isset($curso['descripcion'])){
            $nombre_curso = $curso['descripcion'];
        }
    }

  }
?>

<?php

if(isset($_POST['consultar'])) {
        $id_curso  = remove_junk($db->escape($_POST['id_curso']));
        redirect('ConsultaListadoActividadesEstudiantes.php?id_curso='.$id_curso, false);
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
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


      <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

      <style type="text/css">
          body {  }
          h1 { font-size: xx-large;
              font-weight: bold;
              border-bottom: 1px solid black; }
          div.note {
              position: relative;
              display: block;
              padding: 5pt;
              margin: 5pt;
              white-space: -moz-pre-wrap; /* Mozilla */
              white-space: -pre-wrap;     /* Opera 4 - 6 */
              white-space: -o-pre-wrap;   /* Opera 7 */
              white-space: pre-wrap;      /* CSS3 */
              word-wrap: break-word;      /* IE 5.5+ */ }
      </style>
</head>
<body>

<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>

<div id="Home" class="tabcontent">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <?php
                        if ($nombre_curso){
                            $titulo = "<span>Listado Estudiantes del curso $nombre_curso</span>";
                        } else {
                           $titulo = "<span>Listado Estudiantes</span>";   
                        }

                        echo $titulo;
                    ?>
                  </strong>
                </div>
                <?php
                include("modal/upd_calificacion.php");
                ?>

                <div class="panel-body">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <form method="post" action="ConsultaListadoActividadesEstudiantes.php?id_curso=<?php echo $id_curso ?>" enctype="multipart/form-data">

                                <div class="row">
                                  <div class="col-md-5">
                                      <div class="form-group">
                                          <label for="qty">Curso*</label>
                                          <div class="input-group">
                                              <span class="input-group-addon">
                                                   <i class="glyphicon glyphicon-th-large"></i>
                                              </span>
                                              <select class="form-control"  style="height:2.6em;" name="id_curso">
                                                  <option value="">Selecciona Curso</option>
                                                  <?php  foreach ($listado_cursos as $curso): ?>
                                                      <option value="<?php echo (int)$curso['id']; ?>">
                                                          <?php echo remove_junk($curso['descripcion']); ?>
                                                      </option>
                                                  <?php endforeach; ?>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                                <div><button type="submit" name="consultar" class="btn btn-primary">Consultar</button></div>
                                <div class="x_content">
                                    <table id="Dt_detalleestudiante" class="table table-bordered table-hover" cellpadding="0" width="100%">
                                        <thead>
                                        <tr>
                                            <!--<th>id</th>-->
                                            <th>Actividad</th>
                                            <th>F.Máxima</th>
                                            <th>Calificable</th>
                                            <th>Estudiante</th>
                                            <th>F.Carga</th>
                                            <th>Calificación</th>
                                            <th>Acciones</th>
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
    <script src="js/datepicker/daterangepicker.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/min/moment.min.js"></script>
    <script src="css/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script>
        $(document).on("ready",function(){
            detallerestudiante();
        });
        var detallerestudiante = function(){
            var id_curso  = <?php echo $id_curso;?>;
            var table =$("#Dt_detalleestudiante").DataTable({
                "destroy":true,
                "ajax":{
                  "method":"POST",
                  "url":"ajax/ListadoActividadesCursoEstudiante.php?id_curso="+id_curso,
                   error: function (result){
                     null;
                   }
                },
                "columns":[
                    {"data":"desc_acti"},
                    {"data":"fecha_maxima"},
                    {"data":"calificable"},
                    {"data":"estudiante"},
                    {"data":"fecha_carga"},
                    {"data":"calificacion"},
                    {"defaultContent":"<button type='button'  class='descargar btn btn-lg btn-link' onclick='descargar_archivo();' title='Descargar'><i class='fa fa-pencil-square-o'></i><span class='glyphicon glyphicon-cloud-download'></span></button><button type='button' class='editar btn btn-link btn-lg' onclick='obtener_data_editar();' data-toggle='modal' data-target='.bs-example-modal-lg-udp' title='Editar'><i class='fa fa-pencil-square-o'></i><span class='glyphicon glyphicon-edit'></span></button>"}
                ],
                "language": idioma_espanol,
                dom: 'Bfrtip',
                buttons: [
                     {
                     extend:    'pdfHtml5',
                     titleAttr: 'pdf',
                     title: 'Listado Actividades Estudiantes',
                     exportOptions:{
                         columns: [0,1,3,4,5]
                       }
                     }
                ]
            });
            descargar_archivo("#Dt_detalleestudiante tbody",table);
            obtener_data_editar("#Dt_detalleestudiante tbody",table);
        }
        var descargar_archivo = function(tbody,table) {
            $(tbody).on("click","button.descargar",function() {
                var data = table.row( $(this).parents("tr")).data();
                var imagen = data.documento;
                if (imagen){
                  var myWindow = window.open(imagen, "Sistema Académico Dante", "width=500,height=500");
                } else {
                  alert("La actividad no ha sido cargada");
                }
            });
        }
        var obtener_data_editar = function(tbody,table) {
        $(tbody).on("click", "button.editar", function () {
            var data = table.row($(this).parents("tr")).data();
            var id = $("#id").val(data.id),
                id_user    = $("#id_user").val(data.id_user),
                id_actividad   = $("#id_actividad").val(data.id_actividad),
                calificacion   = $("#calificacion").val(data.calificacion);
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
