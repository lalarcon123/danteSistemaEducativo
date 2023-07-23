<?php
  $page_title = 'Lista de Representantes';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
 
<div class="wrapper">
<br>
<br>
<br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div><div><iframe src="detallesasigestudiantes.php" width="100%" height="800px" frameborder="0" allowtransparency="true" style="background-color: white"></iframe></div></div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php include_once('layouts/footer.php'); ?>
