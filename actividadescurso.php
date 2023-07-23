<?php
    $id_curso = (int)$_GET['id_curso']; 
    require_once('includes/load.php');
    $id_user = $_SESSION['user_id'];
    $title ="Actividades";
?>
<?php 
if(isset($_POST['regresar'])) {
      echo $id_curso;
      redirect('ConsultaCursoInfoDesarrollo.php?id='.$id_curso.'&objetivo=&video=&id_contenido=0&tema=', false);
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
<div class="row">
  <div class="col-md-1">
    <form method="post"><button type="submit" name="regresar" class="btn btn-primary">Regresar</button></form>`
  </div>
  <!--
  <div class="col-md-1">
    <form method="post"><button type="submit" name="regresar" class="btn btn-info">Grabar Evaluación</button></form>
  </div>
-->
</div>`

  <div class="">
    <div class="panel-body">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
      <div class="right_col" role="main"><!-- page content -->
        <div class="">
            <div class="page-title">
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <?php
                    include("modal/upd_carga_actividad.php");
                    ?>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Actividades</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                           <table id="Dt_detalleactividades" class="table table-bordered table-hover" cellpadding="0" width="100%">
                               <thead>
                                    <tr>
                                        <!--<th>id</th>-->
                                        <th>Descripción</th>
                                        <th>Fecha Máxima</th>
                                        <th>Fecha Carga</th>
                                        <th>Calificación</th>
                                        <th>Acciones</th>
                                    </tr>
                               </thead>
                           </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /page content -->

    </div>
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

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

<!--<script type="text/javascript" src="js/detalle.js"></script>-->
<script>
    $(document).on("ready",function(){
        detalleuser();
    });
    var detalleuser = function(){
           var id_user  = <?php echo $id_user;?>;
           var id_curso = <?php echo $id_curso;?>;
           var table =$("#Dt_detalleactividades").DataTable({
               "destroy":true,
               "ajax":{
                   "method":"POST",
                   "url":"ajax/ListadoActividades.php?id_user="+id_user+"&id_curso="+id_curso,
                   error: function (result){
                     null;
                   }
               },
               "columns":[
                   //{"data":"id"},
                   {"data":"descripcion"},
                   {"data":"fecha_maxima"},
                   {"data":"fecha_carga"},
                   {"data":"calificacion"},
                   {"defaultContent":"<button type='button'  class='descargar btn btn-lg btn-link' onclick='descargar_archivo();' title='Descargar'><span class='glyphicon glyphicon-cloud-download'></span></button><button type='button' class='editar btn btn-link btn-lg' onclick='subir_documento();' data-toggle='modal' data-target='.bs-example-modal-lg-udp' title='Subir'><span class='glyphicon glyphicon-open'></span></button>"}
               ],
               "language": idioma_espanol
           });
        descargar_archivo("#Dt_detalleactividades tbody",table);
        subir_documento("#Dt_detalleactividades tbody",table);
    }

    var descargar_archivo = function(tbody,table) {
        $(tbody).on("click","button.descargar",function() {
            var data = table.row( $(this).parents("tr")).data();
            var imagen = data.documento;
            var myWindow = window.open(imagen, "Sistema Académico Dante", "width=500,height=500");
        });
    }
    var subir_documento = function(tbody,table) {
    $(tbody).on("click", "button.editar", function () {
        var data = table.row($(this).parents("tr")).data();
        var id_curso_oferta = $("#id_curso_oferta").val(data.id_curso_oferta),
            id_actividad = $("#id_actividad").val(data.id_actividad),
            fecha_maxima = $("#fecha_maxima").val(data.fecha_maxima);
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

